#!/bin/bash

# Git Automation Script for iDecide Project
# Usage: ./quick-deploy.sh "commit message" [version]
# Example: ./quick-deploy.sh "created login class" "1.5.8.68"

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

echo -e "${BLUE}🚀 iDecide Quick Deploy Script${NC}"
echo "=================================="

# Check if commit message is provided
if [ -z "$1" ]; then
    echo -e "${RED}❌ Error: Please provide a commit message${NC}"
    echo -e "${YELLOW}Usage: ./quick-deploy.sh \"your commit message\" [version]${NC}"
    echo -e "${YELLOW}Example: ./quick-deploy.sh \"created login class\" \"1.5.8.68\"${NC}"
    exit 1
fi

COMMIT_MESSAGE="$1"
VERSION="$2"

# Show current status
echo -e "${BLUE}📊 Current Git Status:${NC}"
git status --short

echo ""
echo -e "${YELLOW}📝 Commit Message: ${NC}$COMMIT_MESSAGE"

# Add all changes
echo -e "${BLUE}📦 Adding all changes...${NC}"
git add .

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✅ Files added successfully${NC}"
else
    echo -e "${RED}❌ Error adding files${NC}"
    exit 1
fi

# Commit changes
echo -e "${BLUE}💾 Committing changes...${NC}"
git commit -m "$COMMIT_MESSAGE"

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✅ Commit successful${NC}"
else
    echo -e "${RED}❌ Error committing changes${NC}"
    exit 1
fi

# Handle versioning
if [ -n "$VERSION" ]; then
    # Version provided
    TAG="v$VERSION"
    echo -e "${BLUE}🏷️  Creating tag: $TAG${NC}"
    git tag "$TAG"
    
    if [ $? -eq 0 ]; then
        echo -e "${GREEN}✅ Tag created successfully${NC}"
    else
        echo -e "${RED}❌ Error creating tag${NC}"
        exit 1
    fi
else
    # No version provided - ask if user wants to create one
    echo -e "${YELLOW}🤔 No version provided. Do you want to create a tag? (y/n)${NC}"
    read -r CREATE_TAG
    
    if [[ $CREATE_TAG =~ ^[Yy]$ ]]; then
        echo -e "${YELLOW}📝 Enter version (e.g., 1.5.8.68):${NC}"
        read -r USER_VERSION
        if [ -n "$USER_VERSION" ]; then
            TAG="v$USER_VERSION"
            echo -e "${BLUE}🏷️  Creating tag: $TAG${NC}"
            git tag "$TAG"
            
            if [ $? -eq 0 ]; then
                echo -e "${GREEN}✅ Tag created successfully${NC}"
            else
                echo -e "${RED}❌ Error creating tag${NC}"
                exit 1
            fi
        fi
    fi
fi

# Push to master/main
echo -e "${BLUE}🚀 Pushing to master...${NC}"
git push origin master

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✅ Pushed to master successfully${NC}"
else
    # Try main branch if master fails
    echo -e "${YELLOW}⚠️  Master failed, trying main branch...${NC}"
    git push origin main
    
    if [ $? -eq 0 ]; then
        echo -e "${GREEN}✅ Pushed to main successfully${NC}"
    else
        echo -e "${RED}❌ Error pushing to repository${NC}"
        exit 1
    fi
fi

# Push tag if it exists
if [ -n "$TAG" ]; then
    echo -e "${BLUE}🏷️  Pushing tag: $TAG${NC}"
    git push origin "$TAG"
    
    if [ $? -eq 0 ]; then
        echo -e "${GREEN}✅ Tag pushed successfully${NC}"
        echo -e "${GREEN}🎉 GitHub Actions will now build and deploy your release!${NC}"
    else
        echo -e "${RED}❌ Error pushing tag${NC}"
        exit 1
    fi
fi

echo ""
echo -e "${GREEN}🎉 All done! Your changes are now live on GitHub${NC}"
echo -e "${BLUE}🔍 Check your GitHub Actions at: https://github.com/modernman00/idecide/actions${NC}"

# Show what was accomplished
echo ""
echo -e "${YELLOW}📋 Summary of actions:${NC}"
echo "• ✅ Added all changes"
echo "• ✅ Committed with message: '$COMMIT_MESSAGE'"
if [ -n "$TAG" ]; then
    echo "• ✅ Created and pushed tag: $TAG"
fi
echo "• ✅ Pushed to repository"
echo ""
echo -e "${BLUE}💡 Next time, you can run:${NC}"
echo -e "${YELLOW}./quick-deploy.sh \"your message\" \"version.number\"${NC}"