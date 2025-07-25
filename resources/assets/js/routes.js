const blogRoutes = {
  showEdit: id => `/showEditBlog/${id}`,
  create: () => `/createBlog`,
  delete: id => `/deleteBlog/${id}`,
  blogMgt: '/blogMgt'
};

const userRoutes = {
  profile: id => `/user/profile/${id}`,
  settings: () => `/user/settings`,
};

export { blogRoutes, userRoutes };