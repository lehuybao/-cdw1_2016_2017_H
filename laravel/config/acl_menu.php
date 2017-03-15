<?php

return [
    /*
      |--------------------------------------------------------------------------
      | Admin panel menu items
      |--------------------------------------------------------------------------
      |
      | Here you can edit the items to show in the admin menu(on top of the page)
      |
     */
    "list" => [
        [
            "name" => "Dashboard",
            "route" => "dashboard",
            "link" => '/admin/users/dashboard',
            "permissions" => []
        ],
        [
            /*
             * the name of the link: you will see it in the admin menu panel.
             * Note: If you don't want to show this item in the menu
             * but still want to handle permission with the 'can_see' filter
             * just leave this field empty.
             */
            "name" => "Users",
            /* the route name associated to the link: used to set
             * the 'active' flag and to validate permissions of all
             * the subroutes associated(users.* will be validated for _superadmin and _group-editor permission)
             */
            "route" => "users",
            /*
             * the actual link associated to the menu item
             */
            "link" => '/admin/users/list',
            /*
             * the list of 'permission name' associated to the menu
             * item: if the logged user has one or more of the permission
             * in the list he can see the menu link and access the area
             * associated with that.
             * Every route that you create with the 'route' as a prefix
             * will check for the permissions and throw a 401 error if the
             * check fails (for example in this case every route named users.*)
             */
            "permissions" => ["_superadmin", "_user-editor"],
            /*
             * if there is any route that you want to skip for the permission check
             * put it in this array
             */
            "skip_permissions" => ["users.selfprofile.edit", "users.profile.edit", "users.profile.addfield", "users.profile.deletefield"]
        ],
        [
            "name" => "Groups",
            "route" => "groups",
            "link" => '/admin/groups/list',
            "permissions" => ["_superadmin", "_group-editor"]
        ],
        [
            "name" => "Permission",
            "route" => "permission",
            "link" => '/admin/permissions/list',
            "permissions" => ["_superadmin", "_permission-editor"]
        ],
        [
            /*
             * Route to edit the current user profile
             */
            "name" => "",
            "route" => "selfprofile",
            "link" => '/admin/users/profile/self',
            "permissions" => []
        ],
        [
            /*
             * Route to edit the current user profile
             */
            "name" => "Sample",
            "route" => "admin_sample",
            "link" => '/admin/sample',
            "permissions" => ["_superadmin","_sample"]
        ],
        // [
        //     /*
        //      * Route to edit the current user profile
        //      */
        //     "name" => "SlideShow",
        //     "route" => "admin_slideshow",
        //     "link" => '/admin/slideshow',
        //     "permissions" => ["_superadmin","_slideshow"]
        // ],
        //  [
        //     /*
        //      * Route to edit the current user profile
        //      */
        //     "name" => "Categories",
        //     "route" => "admin_sample_category",
        //     "link" => '/admin/sample_category',
        //     "permissions" => ["_superadmin","_sample_category"]
        // ],
        [
            /*
             * Route to edit the current user profile
             */
            "name" => "Post",
            "route" => "admin_post",
            "link" => '/admin/post',
            "permissions" => ["_superadmin","_post"]
        ],
       
         [
            /*
             * Route to edit the current user profile
             */
            "name" => "News",
            "route" => "admin_news",
            "link" => '/admin/news',
            "permissions" => ["_superadmin","_news"]
        ],
         [
            /*
             * Route to edit the current user profile
             */
            "name" => "Work",
            "route" => "admin_work",
            "link" => '/admin/work',
            "permissions" => ["_superadmin","_work"]
        ],
           [
            /*
             * Route to edit the current user profile
             */
            "name" => "Product",
            "route" => "admin_product",
            "link" => '/admin/product',
            "permissions" => ["_superadmin","_product"]
        ],
        
             [
            /*
             * Route to edit the current user profile
             */
            "name" => "Contact",
            "route" => "admin_contact",
            "link" => '/admin/contact',
            "permissions" => ["_superadmin","_contact"]
        ],



    ]
];
