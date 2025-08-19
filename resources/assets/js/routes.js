export const blogRoutes = {
  showEdit: id => `/showEditBlog/${id}`,
  create: () => '/createBlog',
  delete: id => `/deleteBlog/${id}`,
  blogMgt: '/blogMgt'
};

export const forgotPasswordRoutes = {
  forgot: '/forgotPassword',
  redirect: 'changePassword'

};

export const loginRoutes = {
  login: '/login',
  redirect: 'managed'
};

export const changePasswordRoutes = {
  changePassword: '/changePassword',
  redirect: 'login'
};

export const userRoutes = {
  profile: id => `/user/profile/${id}`,
  settings: () => '/user/settings',
};

export const appTestRoutes = {
  appTest:  '/apptest',
  redirect: 'appTestIndex',
  appTestForgot: '/appTestForgot',
  appTestForgotRedirect: 'appTestCode',
  appTestCode: '/appTestCode',
  appTestCodeRedirect: 'appTestChange',
  appTestChange: '/appTestChange',  
  appTestChangeRedirect: 'appTest',

};
