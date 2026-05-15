export const blogRoutes = {
  showEdit: id => `/showEditBlog/${id}`,
  create: () => '/createBlog',
  delete: id => `/deleteBlog/${id}`,
  blogMgt: '/blogMgt'
};



export const acctMgtRoutes = {
  login:  '/adminlogin',
  loginRedirect: '/code',
  adminHome: '/adminhome',
  forgot: '/forgot',
  forgotRedirect: '/code',
  code: '/code',
  codeRedirect: 'changePassword',
  changePassword: '/changePassword',  
  changePasswordRedirect: '/adminlogin',
  userLogin: '/login',
  userLoginRedirect: 'code',
  userLoginCodeRedirect: 'history'
};
