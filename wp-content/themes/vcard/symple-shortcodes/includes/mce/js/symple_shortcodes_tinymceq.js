(function() {

    tinymce.PluginManager.add('my_mce_button', function( editor, url ) {

        editor.addButton( 'my_mce_button', {

            text: 'Shortcode',

            icon: false,

            type: 'menubutton',

            menu: [

                {

                        text: 'Profile',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Vcard Profile',

                                    body: [

                                        {

                                            type: 'textbox',

                                            name: 'textName11',

                                            label: 'Say Hi/Hello',

                                            value: 'Hello, I am'

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'textName1',

                                            label: 'Your Name',

                                            value: 'Robb Armstrong'

                                        },
                                        {

                                            type: 'textbox',

                                            name: 'textName2',

                                            label: 'Designation',

                                            value: 'Designer and Front-end Developer'

                                        },



                                        {

                                            type: 'textbox',

                                            name: 'multilineName1',

                                            label: 'Feature Content',

                                            value: 'I have ten years experience as a web/interface designer. I have a love of clean, elegant styling, and I have lots of experience in the production of CSS and (X)HTML for modern websites. I have a reasonable grasp of using JavaScript frameworks, specifically jQuery.',

                                            multiline: true,

                                            minWidth: 450,

                                            minHeight: 50,

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'textboxTitle1',

                                            label: 'Title :',

                                            value: 'Name'

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'textboxName1',

                                            label: 'Desc :',

                                            value: 'Robb Armstrong'

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'textboxTitle2',

                                            label: 'Title :',

                                            value: 'Date of Birth'

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'textboxName2',

                                            label: 'Desc :',

                                            value: 'September 06, 1976'

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'textboxTitle3',

                                            label: 'Title :',

                                            value: 'e-mail'

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'textboxName3',

                                            label: 'Desc :',

                                            value: 'info@yourdomain.com'

                                        },



                                        {

                                            type: 'textbox',

                                            name: 'textboxTitle4',

                                            label: 'Title :',

                                            value: 'Address'

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'textboxName4',

                                            label: 'Desc :',

                                            value: '121 King St, Melbourne VIC'

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'textboxTitle5',

                                            label: 'Title :',

                                            value: 'Phone'

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'textboxName5',

                                            label: 'Desc :',

                                            value: '012-3456-7890'

                                        },

                                        
                                        
                                    ],

                                    onsubmit: function( e ) {
                                        editor.insertContent( '[Profile say="' + e.data.textName11 + '" name="' + e.data.textName1 + '" designation="' + e.data.textName2 + '"]<br/>[Profile_objective]' + e.data.multilineName1 + '<br/>[/Profile_objective]<br/><br/>[Profile_info title="Personal Info"][Profile_info_section title="' + e.data.textboxTitle1 +'" desc="' + e.data.textboxName1 + '"][Profile_info_section title="' + e.data.textboxTitle2 +'" desc="' + e.data.textboxName2 + '"][Profile_info_section title="' + e.data.textboxTitle3 +'" desc="' + e.data.textboxName3 + '"][Profile_info_section title="' + e.data.textboxTitle4 +'" desc="' + e.data.textboxName4 + '"][Profile_info_section title="' + e.data.textboxTitle5 +'" desc="' + e.data.textboxName5 + '"][/Profile_info][/Profile]' );
                                        
                                        

                                    }

                                });

                            }

                        },

                        {

                            text: 'Portfolio',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Portfolio Shortcode',

                                    body: [

                                        {

                                            type: 'textbox',

                                            name: 'textboxName',

                                            label: 'Page Title',

                                            value: 'Portfolio'

                                        },
                                        
                                        {

                                            type: 'textbox',

                                            name: 'textboxpagination',

                                            label: 'Pagination Content',

                                            value: 'Go to next/previous page'

                                        },
                                       
                                                                                                                   

                                    ],

                                    onsubmit: function( e ) {

                                        editor.insertContent( '[portfolio]<br/>[portfolio_head title="' + e.data.textboxName + '" pagination="' + e.data.textboxpagination + '"][portfolio_body][/portfolio]' );
                                        
                                    }

                                });

                            }

                        },

                        {

                            text: 'Blog',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Blog Shortcode',

                                    body: [

                                        {

                                            type: 'textbox',

                                            name: 'textboxName',

                                            label: 'Page Title',

                                            value: 'Blog'

                                        },
                                        

                                       {

                                            type: 'textbox',

                                            name: 'textboxpagination',

                                            label: 'Pagination Content',

                                            value: 'Go to next/previous page'

                                        },
                                                                                                                   

                                    ],

                                    onsubmit: function( e ) {

                                        editor.insertContent( '[blog]<br/>[blog_head title="' + e.data.textboxName + '" pagination="' + e.data.textboxpagination + '"][blog_body][/blog]' );
                                        
                                    }

                                });

                            }

                        },

                        {

                            text: 'Resume',

                           menu: [

                            {

                            text: 'Resume border',

                            onclick: function() {

                         

                                        editor.insertContent( '[resume]<br/><br/>[/resume]' );
                                        
                                                  
                            }

                        },

                        {

                            text: 'Resume Head',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Resume Head Shortcode',

                                    body: [

                                        {

                                            type: 'textbox',

                                            name: 'textboxName',

                                            label: 'Page Title',

                                            value: 'Resume'

                                        },
                                        

                                       {

                                            type: 'textbox',

                                            name: 'textboxpagination',

                                            label: 'Pagination Content',

                                            value: 'Go to next/previous page'

                                        },
                                                                                                                   

                                    ],

                                    onsubmit: function( e ) {

                                        editor.insertContent( '[resume_head title="' + e.data.textboxName + '" pagination="' + e.data.textboxpagination + '"]' );
                                        
                                    }

                                });

                            }

                        },

                        {

                            text: 'Resume Edication',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Resume Education Shortcode',

                                    body: [

                                        {

                                            type: 'textbox',

                                            name: 'textboxName',

                                            label: 'Title',

                                            value: 'Education'

                                        },
                                        

                                       
                                                                                                                   

                                    ],

                                    onsubmit: function( e ) {

                                        editor.insertContent( '[resume_education title="' + e.data.textboxName + '"]' );
                                        
                                    }

                                });

                            }

                        },

                        {

                            text: 'Resume Skill',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Resume Skill Shortcode',

                                    body: [

                                        {

                                            type: 'textbox',

                                            name: 'textboxName',

                                            label: 'Title',

                                            value: 'Skill'

                                        },

                                       

                                    ],

                                    onsubmit: function( e ) {

                                        editor.insertContent( '[resume_skill title="' + e.data.textboxName + '"]' );
                                        
                                    }

                                });

                            }

                        },

                         {

                            text: 'Resume Services',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Resume Services Shortcode',

                                    body: [

                                        {

                                            type: 'textbox',

                                            name: 'textboxName',

                                            label: 'Title',

                                            value: 'Service'

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'textboxName1',

                                            label: 'Service Name 1',

                                            value: 'Design'

                                        },

                                        {

                                            type: 'listbox',

                                            name: 'textboxName2',

                                            label: 'Service 1 Icon ',

                                            values: [
                                                { text: 'cloud', value: 'fa-cloud' },
                                                { text: 'smile', value: 'fa-smile-o' },
                                                { text: 'desktop', value: 'fa-desktop' },
                                                { text: 'text', value: 'fa-text-width' },
                                                { text: 'comment', value: 'fa-comment' },
                                                { text: 'picture', value: 'fa-picture-o' },
                                                { text: 'eye', value: 'fa-eye' },
                                                { text: 'Global', value: 'fa-globe' },
                                                { text: 'Times', value: 'fa-times' },
                                                { text: 'Book', value: 'fa-book' },
                                                { text: 'Spinner', value: 'fa-spinner' },
                                                { text: 'Pencil', value: 'fa-pencil' },

                                                ]
                                        },

                                         {

                                            type: 'textbox',

                                            name: 'textboxName3',

                                            label: 'Service Name 1',

                                            value: 'Coding'

                                        },

                                        {

                                            type: 'listbox',

                                            name: 'textboxName4',

                                            label: 'Service 1 Icon ',

                                            values: [
                                                { text: 'cloud', value: 'fa-cloud' },
                                                { text: 'smile', value: 'fa-smile-o' },
                                                { text: 'desktop', value: 'fa-desktop' },
                                                { text: 'text', value: 'fa-text-width' },
                                                { text: 'comment', value: 'fa-comment' },
                                                { text: 'picture', value: 'fa-picture-o' },
                                                { text: 'eye', value: 'fa-eye' },
                                                { text: 'Global', value: 'fa-globe' },
                                                { text: 'Times', value: 'fa-times' },
                                                { text: 'Book', value: 'fa-book' },
                                                { text: 'Spinner', value: 'fa-spinner' },
                                                { text: 'Pencil', value: 'fa-pencil' },

                                                ]
                                        },

                                         {

                                            type: 'textbox',

                                            name: 'textboxName5',

                                            label: 'Service Name 1',

                                            value: 'Responsive'

                                        },

                                        {

                                            type: 'listbox',

                                            name: 'textboxName6',

                                            label: 'Service 1 Icon ',

                                            values: [
                                                { text: 'cloud', value: 'fa-cloud' },
                                                { text: 'smile', value: 'fa-smile-o' },
                                                { text: 'desktop', value: 'fa-desktop' },
                                                { text: 'text', value: 'fa-text-width' },
                                                { text: 'comment', value: 'fa-comment' },
                                                { text: 'picture', value: 'fa-picture-o' },
                                                { text: 'eye', value: 'fa-eye' },
                                                { text: 'Global', value: 'fa-globe' },
                                                { text: 'Times', value: 'fa-times' },
                                                { text: 'Book', value: 'fa-book' },
                                                { text: 'Spinner', value: 'fa-spinner' },
                                                { text: 'Pencil', value: 'fa-pencil' },

                                                ]
                                        },

                                         {

                                            type: 'textbox',

                                            name: 'textboxName7',

                                            label: 'Service Name 1',

                                            value: 'Planing'

                                        },

                                        {

                                            type: 'listbox',

                                            name: 'textboxName8',

                                            label: 'Service 1 Icon ',

                                            values: [
                                                { text: 'cloud', value: 'fa-cloud' },
                                                { text: 'smile', value: 'fa-smile-o' },
                                                { text: 'desktop', value: 'fa-desktop' },
                                                { text: 'text', value: 'fa-text-width' },
                                                { text: 'comment', value: 'fa-comment' },
                                                { text: 'picture', value: 'fa-picture-o' },
                                                { text: 'eye', value: 'fa-eye' },
                                                { text: 'Global', value: 'fa-globe' },
                                                { text: 'Times', value: 'fa-times' },
                                                { text: 'Book', value: 'fa-book' },
                                                { text: 'Spinner', value: 'fa-spinner' },
                                                { text: 'Pencil', value: 'fa-pencil' },

                                                ]
                                        },

                                         {

                                            type: 'textbox',

                                            name: 'textboxName9',

                                            label: 'Service Name 1',

                                            value: 'Wordpress'

                                        },

                                        {

                                            type: 'listbox',

                                            name: 'textboxName10',

                                            label: 'Service 1 Icon ',

                                            values: [
                                                { text: 'cloud', value: 'fa-cloud' },
                                                { text: 'smile', value: 'fa-smile-o' },
                                                { text: 'desktop', value: 'fa-desktop' },
                                                { text: 'text', value: 'fa-text-width' },
                                                { text: 'comment', value: 'fa-comment' },
                                                { text: 'picture', value: 'fa-picture-o' },
                                                { text: 'eye', value: 'fa-eye' },
                                                { text: 'Global', value: 'fa-globe' },
                                                { text: 'Times', value: 'fa-times' },
                                                { text: 'Book', value: 'fa-book' },
                                                { text: 'Spinner', value: 'fa-spinner' },
                                                { text: 'Pencil', value: 'fa-pencil' },

                                                ]
                                        },

                                         {

                                            type: 'textbox',

                                            name: 'textboxName11',

                                            label: 'Service Name 1',

                                            value: 'Photography'

                                        },

                                        {

                                            type: 'listbox',

                                            name: 'textboxName12',

                                            label: 'Service 1 Icon ',

                                            values: [
                                                { text: 'cloud', value: 'fa-cloud' },
                                                { text: 'smile', value: 'fa-smile-o' },
                                                { text: 'desktop', value: 'fa-desktop' },
                                                { text: 'text', value: 'fa-text-width' },
                                                { text: 'comment', value: 'fa-comment' },
                                                { text: 'picture', value: 'fa-picture-o' },
                                                { text: 'eye', value: 'fa-eye' },
                                                { text: 'Globe', value: 'fa-globe' },
                                                { text: 'Time', value: 'fa-times' },
                                                { text: 'Book', value: 'fa-book' },
                                                { text: 'Spinner', value: 'fa-spinner' },
                                                { text: 'Pencil', value: 'fa-pencil' },

                                                ]
                                        },

                                     

                                    ],

                                    onsubmit: function( e ) {

                                        editor.insertContent( '[resume_service title="' + e.data.textboxName + '"]<br/>[resume_service_body service_n="' + e.data.textboxName1 + '" service_i="' + e.data.textboxName2 + '"][/resume_service_body][resume_service_body service_n="' + e.data.textboxName3 + '" service_i="' + e.data.textboxName4 + '"][/resume_service_body][resume_service_body service_n="' + e.data.textboxName5 + '" service_i="' + e.data.textboxName6 + '"][/resume_service_body]<br/>[resume_service_body service_n="' + e.data.textboxName7 + '" service_i="' + e.data.textboxName8 + '"][/resume_service_body]<br/>[resume_service_body service_n="' + e.data.textboxName9 + '" service_i="' + e.data.textboxName10 + '"][/resume_service_body]<br/>[resume_service_body service_n="' + e.data.textboxName11 + '" service_i="' + e.data.textboxName12 + '"][/resume_service_body][/resume_service]' );
                                        
                                    }

                                });

                            }

                        },

                        {

                            text: 'Resume Experience',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Resume Experience Shortcode',

                                    body: [

                                        {

                                            type: 'textbox',

                                            name: 'textboxName',

                                            label: 'Title',

                                            value: 'Work Experience'

                                        },
                                        

                                       
                                                                                                                   

                                    ],

                                    onsubmit: function( e ) {

                                        editor.insertContent( '[resume_experience title="' + e.data.textboxName + '"]' );
                                        
                                    }

                                });

                            }

                        },

                        {

                            text: 'Other',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Other Section in Resume',

                                    body: [

                                        {

                                            type: 'textbox',

                                            name: 'textboxName',

                                            label: 'Title',

                                            value: 'Other Head'

                                        },
                                        
                                        {

                                            type: 'textbox',

                                            name: 'multilineName1',

                                            label: 'Other Content',

                                            value: 'Other Content You can Write Here',

                                            multiline: true,

                                            minWidth: 450,

                                            minHeight: 100,

                                        },                                      
                                                                                                                   

                                    ],

                                    onsubmit: function( e ) {

                                        editor.insertContent( '[resume_other title="' + e.data.textboxName + '"]<br>' + e.data.multilineName1 + '[/resume_other]' );
                                        
                                    }

                                });

                            }

                        },

                       
                    ]
                        },


                        {

                            text: 'Contact',

                           menu: [

                            

                        {

                            text: 'Contact Us Normal',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Contact Shortcode',

                                    body: [

                                        {

                                            type: 'textbox',

                                            name: 'textboxName',

                                            label: 'Page Title',

                                            value: 'Contact Us'

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'contactinfo',

                                            label: 'Contact info Title',

                                            value: 'Contact info'

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'multilineName',

                                            label: 'Blog Content',

                                            value: 'This is Photoshop’s version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.',

                                            multiline: true,

                                            minWidth: 450,

                                            minHeight: 50,

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'address',

                                            label: 'Contact Address',

                                            value: 'lorem ipsum street'

                                        },

                                        {

                                            type: 'listbox',

                                            name: 'icon1',

                                            label: 'Info 1 Icon ',

                                            values: [
                                                { text: 'home', value: 'fa-home' },
                                                { text: 'phone', value: 'fa-phone' },
                                                { text: 'envelope', value: 'fa-envelope' },
                                                
                                                ]
                                        },

                                        {

                                            type: 'textbox',

                                            name: 'phone',

                                            label: 'Contact Phone',

                                            value: '+399 (500) 321 9548'

                                        },

                                        {

                                            type: 'listbox',

                                            name: 'icon2',

                                            label: 'Info 2 Icon ',

                                            values: [
                                                { text: 'phone', value: 'fa-phone' },
                                                { text: 'home', value: 'fa-home' },
                                                { text: 'envelope', value: 'fa-envelope' },
                                                
                                                ]
                                        },

                                        {

                                            type: 'textbox',

                                            name: 'email',

                                            label: 'info@domain.com',

                                            value: 'Contact E-mail'

                                        },

                                        {

                                            type: 'listbox',

                                            name: 'icon3',

                                            label: 'Info 3 Icon ',

                                            values: [
                                                { text: 'envelope', value: 'fa-envelope' },
                                                { text: 'phone', value: 'fa-phone' },
                                                { text: 'home', value: 'fa-home' },
                                                
                                                
                                                ]
                                        },

                                        {

                                            type: 'textbox',

                                            name: 'contact',

                                            label: 'Contact from-7 Shortcode',

                                            value: '[contact-form-7 id="100" title="Contact form 1"]'

                                        },

                                                                        

                                    ],

                                    onsubmit: function( e ) {

                                        editor.insertContent( '[contact]<br/>[contact_head title="' + e.data.textboxName + '"][contact_info][contact_body_head title="' + e.data.contactinfo + '"]' + e.data.multilineName + '<br/>[/contact_body_head][contact_body_info][contact_body_details name="' + e.data.address + '" icon="' + e.data.icon1 + '"][contact_body_details  name="' + e.data.phone + '"  icon="' + e.data.icon2 + '"][contact_body_details name="' + e.data.email + '" icon="' + e.data.icon3 + '"][/contact_body_info][/contact_info]' + e.data.contact + '[/contact]' );
                                        
                                    }

                                });

                            }

                        },

                        {

                            text: 'Contact When Select Gmap',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Contact Shortcode',

                                    body: [

                                        
                                        {

                                            type: 'textbox',

                                            name: 'contactinfo',

                                            label: 'Contact info Title',

                                            value: 'Contact info'

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'multilineName',

                                            label: 'Blog Content',

                                            value: 'This is Photoshop’s version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.',

                                            multiline: true,

                                            minWidth: 450,

                                            minHeight: 50,

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'address',

                                            label: 'Contact Address',

                                            value: 'lorem ipsum street'

                                        },

                                        {

                                            type: 'listbox',

                                            name: 'icon1',

                                            label: 'Info 1 Icon ',

                                            values: [
                                                { text: 'home', value: 'fa-home' },
                                                { text: 'phone', value: 'fa-phone' },
                                                { text: 'envelope', value: 'fa-envelope' },
                                                
                                                ]
                                        },

                                        {

                                            type: 'textbox',

                                            name: 'phone',

                                            label: 'Contact Phone',

                                            value: '+399 (500) 321 9548'

                                        },

                                        {

                                            type: 'listbox',

                                            name: 'icon2',

                                            label: 'Info 2 Icon ',

                                            values: [
                                                { text: 'phone', value: 'fa-phone' },
                                                { text: 'home', value: 'fa-home' },
                                                { text: 'envelope', value: 'fa-envelope' },
                                                
                                                ]
                                        },

                                        {

                                            type: 'textbox',

                                            name: 'email',

                                            label: 'info@domain.com',

                                            value: 'Contact E-mail'

                                        },

                                        {

                                            type: 'listbox',

                                            name: 'icon3',

                                            label: 'Info 3 Icon ',

                                            values: [
                                                { text: 'envelope', value: 'fa-envelope' },
                                                { text: 'phone', value: 'fa-phone' },
                                                { text: 'home', value: 'fa-home' },
                                                
                                                
                                                ]
                                        },

                                        {

                                            type: 'textbox',

                                            name: 'contact',

                                            label: 'Contact from-7 Shortcode',

                                            value: '[contact-form-7 id="100" title="Contact form 1"]'

                                        },


                                                                              
                                                                                                                   

                                    ],

                                    onsubmit: function( e ) {

                                        editor.insertContent( '[contact_info][contact_body_head title="' + e.data.contactinfo + '"]' + e.data.multilineName + '<br/>[/contact_body_head][contact_body_info][contact_body_details name="' + e.data.address + '" icon="' + e.data.icon1 + '"][contact_body_details  name="' + e.data.phone + '"  icon="' + e.data.icon2 + '"][contact_body_details name="' + e.data.email + '" icon="' + e.data.icon3 + '"][/contact_body_info][/contact_info]' + e.data.contact + '' );
                                        
                                    }

                                });

                            }

                        },

                      
                       
                    ]
                        },

                     
                    ]


               

        });

    });

})();
