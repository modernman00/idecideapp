# PSR-4 Autoloading Fix Plan

## Problem
The current project structure doesn't comply with PSR-4 autoloading standards. Specifically:
- Directory naming: `app/classes` (lowercase) vs `App\Classes` namespace (uppercase C)
- File names may not match class names exactly (including case sensitivity)
- Some classes may be missing proper namespace declarations

## Solution Plan

### Phase 1: Create Proper Directory Structure
1. Create directory `app/Classes` (with uppercase C)
```bash
mkdir -p app/Classes
```

### Phase 2: Fix Session.php and ValidateRequest.php as a Test
1. Copy files from old to new directory with correct casing
```bash
cp app/classes/Session.php app/Classes/Session.php
cp app/classes/ValidateRequest.php app/Classes/ValidateRequest.php
```

2. Update namespace in files if needed (should be `namespace App\Classes;`)

3. Run composer dump-autoload to test the fix
```bash
composer dump-autoload
```

### Phase 3: Fix Remaining Files
Once the test is successful, repeat for all remaining files:

1. Examine each file in app/classes:
   - Check the class name in the file
   - Ensure the filename matches the class name exactly
   - Verify the namespace is correctly set to `App\Classes`

2. For each file, create a properly named copy in the new directory
```bash
cp app/classes/[original].php app/Classes/[ClassNameExact].php
```

3. Update namespaces where needed

### Phase 4: Update References
1. Search for files that reference these classes
2. Update import statements and class references as needed

### Phase 5: Remove Old Directory
Once all files are migrated and the application is working:
```bash
rm -rf app/classes
```

### Phase 6: Update composer.json
Ensure composer.json properly maps the namespace to the directory:
```json
"autoload": {
    "psr-4": {
        "App\\": "app/"
    }
}
```

### Phase 7: Final Verification
```bash
composer dump-autoload
```

Run the application to confirm everything works correctly.

