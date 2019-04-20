
Install Custom Post Type UI
===

Menu-> tools -> Inport Post types Tabs

{"sport":{"name":"sport","label":"Sports","singular_label":"Sport","description":"","public":"true","publicly_queryable":"true","show_ui":"true","show_in_nav_menus":"true","show_in_rest":"true","rest_base":"","rest_controller_class":"","has_archive":"true","has_archive_string":"sports","exclude_from_search":"false","capability_type":"post","hierarchical":"false","rewrite":"true","rewrite_slug":"","rewrite_withfront":"true","query_var":"true","query_var_slug":"","menu_position":"5","show_in_menu":"true","show_in_menu_string":"","menu_icon":"dashicons-sos","supports":["title","editor","thumbnail"],"taxonomies":[],"labels":{"menu_name":"","all_items":"","add_new":"","add_new_item":"","edit_item":"","new_item":"","view_item":"","view_items":"","search_items":"","not_found":"","not_found_in_trash":"","parent_item_colon":"","featured_image":"","set_featured_image":"","remove_featured_image":"","use_featured_image":"","archives":"","insert_into_item":"","uploaded_to_this_item":"","filter_items_list":"","items_list_navigation":"","items_list":"","attributes":"","name_admin_bar":""},"custom_supports":""}}

Menu-> tools -> Import Taxonomies Tabs

{"sport_category":{"name":"sport_category","label":"Sports Categories","singular_label":"Sport Category","description":"","public":"true","publicly_queryable":"true","hierarchical":"true","show_ui":"true","show_in_menu":"true","show_in_nav_menus":"true","query_var":"true","query_var_slug":"","rewrite":"true","rewrite_slug":"","rewrite_withfront":"1","rewrite_hierarchical":"0","show_admin_column":"true","show_in_rest":"true","show_in_quick_edit":"","rest_base":"","rest_controller_class":"","labels":{"menu_name":"","all_items":"","edit_item":"","view_item":"","update_item":"","add_new_item":"","new_item_name":"","parent_item":"","parent_item_colon":"","search_items":"","popular_items":"","separate_items_with_commas":"","add_or_remove_items":"","choose_from_most_used":"","not_found":"","no_terms":"","items_list_navigation":"","items_list":""},"meta_box_cb":"","object_types":["sport"]}}


Getting Started
---------------

If you want to keep it simple, head over to https://underscores.me and generate your `_s` based theme from there. You just input the name of the theme you want to create, click the "Generate" button, and you get your ready-to-awesomize starter theme.

If you want to set things up manually, download `_s` from GitHub. The first thing you want to do is copy the `_s` directory and change the name to something else (like, say, `megatherium-is-awesome`), and then you'll need to do a five-step find and replace on the name in all the templates.

1. Search for `'_s'` (inside single quotations) to capture the text domain.
2. Search for `_s_` to capture all the function names.
3. Search for `Text Domain: _s` in `style.css`.
4. Search for <code>&nbsp;_s</code> (with a space before it) to capture DocBlocks.
5. Search for `_s-` to capture prefixed handles.

OR

1. Search for: `'_s'` and replace with: `'megatherium-is-awesome'`.
2. Search for: `_s_` and replace with: `megatherium_is_awesome_`.
3. Search for: `Text Domain: _s` and replace with: `Text Domain: megatherium-is-awesome` in `style.css`.
4. Search for: <code>&nbsp;_s</code> and replace with: <code>&nbsp;Megatherium_is_Awesome</code>.
5. Search for: `_s-` and replace with: `megatherium-is-awesome-`.

Then, update the stylesheet header in `style.css`, the links in `footer.php` with your own information and rename `_s.pot` from `languages` folder to use the theme's slug. Next, update or delete this readme.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
