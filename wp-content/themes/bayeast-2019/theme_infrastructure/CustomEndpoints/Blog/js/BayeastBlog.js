//so our js won't care if we change plugin stuff
//create_portfolio_endpoint will be set to our /wp-json/projects/v1/get_portfolio_listing endpoint
//if we change the name of this our JS won't care because it just looks at this
//rest_object.get_portfolio_listing set in RebathProjects.php
var BlogHelper = {
  blog_endpoint: rest_object.get_blog_listing,
};
