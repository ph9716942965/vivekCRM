<?=
//isset(Yii::$app->user->identity->username)?
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    ["label" => "Dashboard", "url" => "/crm/frontend/web/", "icon" => "home"],
                                    [
                                        "label" => "Master",
                                        "url" => "#",
                                        "icon" => "table",
                                        "items" => [
                                           // ["label" => "Users","url" => "/"],
                                            ["label" => "Dashboard","url" => "/crm/frontend/web/"],
                                            ["label" => "New Leads","url" => "/crm/frontend/web/index.php?r=leads"],
                                            ["label" => "Allocate Leads","url" => "/crm/frontend/web/index.php?r=disposition"],
                                           // ["label" => "Agents","url" => "/"],
                                            ["label" => "Agents",
                                                "url" => "#",
                                                "items" => [
                                                    ["label" => "Sing Up","url" => "/crm/frontend/web/index.php?r=site/signup",],
                                                    ["label" => "Remove Agent","url" => "/",],
                                                ],
                                            ],
                                           // ["label" => "Manage Learn Booking","url" => "/amex"],
                                            ["label" => "Reports",
                                                "url" => "#",
                                                "items" => [
                                                    ["label" => "Customer Reports","url" => "/amex"],
                                                    ["label" => "Agents Reports","url" => "/amex"],
                                                    ["label" => "Sales Reports","url" => "/amex"],
                                                ],
                                            ],
                                           // ["label" => "View Golf Courses","url" => "/amex"],
                                                                                      
                                        ],
                                    ],
                                  /*  [
                                        "label" => "ENBD",
                                        "url" => "#",
                                        "icon" => "table",
                                        "items" => [
                                            ["label" => "Users","url" => "/enbd/web-user-master"],
                                            // ["label" => "web-user-cards","url" => "/enbd/web-user-cards",],
                                            // ["label" => "four-ball-master","url" => "/enbd/four-ball-master",],
                                            // ["label" => "golf-course-master","url" => "/enbd/golf-course-master"],
                                            // ["label" => "comp-golf-course-book","url" => "/enbd/comp-golf-course-book"],
                                            // ["label" => "golfcourse-max-book","url" => "/enbd/golfcourse-max-book",],
                                            // ["label" => "no-show-penality","url" => "/enbd/no-show-penality"],
                                            
                                            // ["label" => "Master",
                                            //     "url" => "#",
                                            //     "items" => [["label" => "country-list","url" => "/enbd/country-list",],
                                            //         ["label" => "one-time-password","url" => "/enbd/one-time-password",],
                                            //         ["label" => "user-password-reset","url" => "/enbd/user-password-reset",],
                                            //         ["label" => "paypal-log","url" => "/enbd/paypal-log",],
                                            //         ["label" => "week-day-bin-numbers","url" => "/enbd/week-day-bin-numbers",],
                                            //         ["label" => "convert-currency","url" => "/enbd/convert-currency",],                         
                                            //     ],
                                            // ],
                                        ],
                                    ], */
                                 /*   [
                                        "label" => "SCBUAE",
                                        "url" => "#",
                                        "icon" => "table",
                                        "items" => [
                                            ["label" => "Users","url" => "/scbuae/golfer"],
                                            ["label" => "Activity Logs","url" => "/scbuae/customer-care-executive-activity-log"],
                                            //["label" => "booking","url" => "/scbuae/booking"],
                                            //["label" => "customer-care-executive","url" => "/scbuae/customer-care-executive"],
                                            // ["label" => "golf-course","url" => "/scbuae/golf-course"],
                                           
                                            //["label" => "guest-payment","url" => "/scbuae/guest-payment"],
                                            //["label" => "tee-time","url" => "/scbuae/tee-time"],
                                            // ["label" => "Master",
                                            //     "url" => "#",
                                            //     "items" => [["label" => "account-type","url" => "/scbuae/account-type"],
                                            //         ["label" => "booking-status","url" => "/scbuae/booking-status"],
                                            //         ["label" => "guest-payment-status","url" => "/scbuae/guest-payment-status"],
                                            //     ],
                                            // ],
                                        ],
                                    ], */
                                ],
                            ]
                        )
//: ""
?>