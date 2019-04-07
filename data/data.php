<?php

return [
    'books' => [
        [
            'title' => '',
            'img' => '/images/clean-code.jpg',
            'link' => 'https://www.amazon.com/Clean-Code-Handbook-Software-Craftsmanship/dp/0132350882',
        ],
        [
            'title' => '',
            'img' => '/images/unit-testing.jpg',
            'link' => 'https://www.amazon.com/Art-Unit-Testing-examples/dp/1617290890',
        ],
        [
            'title' => '',
            'img' => '/images/php-1.jpg',
            'link' => 'https://www.amazon.com/Pro-PHP-Application-Performance-Projects/dp/1430228989',
        ],
    ],
    'projects' => [
        [
            'title' => 'Hotel Alexa',
            'contribution' => ['design', 'solo developer'],
            'imgs' => [
                '/images/projects/alexa/1.png',
                '/images/projects/alexa/2.png',
                '/images/projects/alexa/3.png',
                '/images/projects/alexa/4.png',
                '/images/projects/alexa/5.png',
                '/images/projects/alexa/6.png',
                '/images/projects/alexa/7.png',
                '/images/projects/alexa/8.png',
                '/images/projects/alexa/9.png',
                '/images/projects/alexa/10.png',
                '/images/projects/alexa/11.png',
                '/images/projects/alexa/12.png',
            ],
            'technology' => ['JavaScript ES6+, Node.js, Serverless, Angular5, DynamoDB',],
            'descr' => 'A company project that I was assigned to and had to create after design and alot of technical discussion. AWS Alexa (Amazon\'s cloud-based voice service) app for basic F&Qs in hotels/rooms that runs on AWS (lambda & S3).'
            . 'Admin users, Users (hotel user), questions, answers are managed in an admin panel (Angular5). Database used for storage and session - DynamoDB.'
            . '<br/>Basic workflow and usage: <br/>'
            . '<ul>'
            . '<li>The AWS Alexa skill must be installed on the AWS echo device. (Same workflow as installing an app on mobile phone)</li>'
            . '<li>After the app is installed on the echo device the user follows OAuth process and signs up with provided user (at that stage the user accounts were requested to the app owners)</li>'
            . '<li>After the OAuth process was complete the app backend returns a token generated for the target user. This tokes is sent everytime the skill is invoked (along the thiggered intent)</li>'
            . '<li>Every hotel can have 1 or more devices configured to one or multiple users</li>'
            . '<li>Admins can dynamicaly configure which phrases can trigger an intent. After they change some intent or phrase the intent schema of the app is built and sent for Amazon approval</li>'
            . '<li>Admins can also dynamically configure the answers but the  intent scheme doesn\'t require rebuild as they are stored in the database</li>'

            . '</ul>'
            
        ],
        [
            'title' => 'Code Hospitality SPA',
            'contribution' => ['solo developer'],
            'imgs' => [
                '/images/projects/code/1.png',
                '/images/projects/code/2.png',
                '/images/projects/code/3.png',
            ],
            'technology' => ['Typescript, Angular5',],
            'descr' => 'A company project that I was assigned to and had to build with some provided ui design for some components. SPA management panel for Code Hospitality. Used as template project for other company projects.',
        ],
        [
            'title' => 'Twoter',
            'contribution' => ['design', 'solo developer'],
            'imgs' => [
                '/images/projects/twoter/1.png',
                '/images/projects/twoter/2.png',
                '/images/projects/twoter/3.png',
            ],
            'code' => 'https://github.com/twoter',
            'technology' => ['Typescript, Java8, Angular5, Spring5, Spring Boot, SQL, MySQL',],
            'descr' => 'Part of a mini social network project combining features from Facebook and Twitter (post updates and comments, like updates and comments, register, login, follow other users, receive notification in realtime when your comment/update is liked, when someone you followed has posted an update).'
            . '<br/>Features:'
            . '<ul>'
            . '<li>Auth: sign up, login, logout</li>'
            . '<li>Update profile info, profile picture, etc.</li>'
            . '<li>Follow other users</li>'
            . '<li>Post updates. Updates may contain tags.</li>'
            . '<li>Search updates by tags</li>'
            . '<li>Comment updates</li>'
            . '<li>Like posts and updates</li>'
            . '<li>Receive realtime notifications for someone commenting on your updates, liking your updates or comments, someone you follow posts something.</li>'

            . '</ul>'
            ,
        ],
        [
            'title' => 'Eveneres',
            'contribution' => ['design', 'solo developer'],
            'imgs' => [
                '/images/projects/event/3.jpg',
                '/images/projects/event/4.jpg',
                '/images/projects/event/5.jpg',
                '/images/projects/event/6.jpg',
                '/images/projects/event/7.jpg',
                '/images/projects/event/8.jpg',
                '/images/projects/event/9.jpg',
                '/images/projects/event/1.jpg',
                '/images/projects/event/2.jpg',
            ],
            'technology' => ['PHP 5.6, custom framework (Yii2 like), SQL, MySQL',],
            'note' => 'No found XSS, SQL Injection, Email Injection vulnerabilities',
            'descr' => 'A web application for creating and finding events. With the main functonality of flexible search of events by address, radius of a location or simply by categories or tags.',
        ],
        [
            'title' => '9gag like web application',
            'imgs' => [
                '/images/projects/fun/1.jpg',
                '/images/projects/fun/2.jpg',
                '/images/projects/fun/3.jpg',
                '/images/projects/fun/4.jpg',
            ],
            'contribution' => ['design', 'solo developer'],
            'technology' => ['PHP 5.6, SQL, MySQL',],
            'note' => 'No found XSS, SQL Injection vulnerabilities',
            'descr' => 'A web application for creating, liking and sharing updates. This application was part of a course assignment.'
            . '<br/>Features:'
            . '<ul>'
            . '<li>Auth: sign up, login, logout</li>'
            . '<li>Update profile info, profile picture, etc.</li>'
            . '<li>Post image or gif posts</li>'
            . '<li>Like, comment and share posts</li>'
            . '<li>Add posts to categories and add tags</li>'
            . '<li>Search posts by tags</li>'
            . '<li>View posts by categories</li>'
            . '<li>View trending or fresh posts</li>'
            . '<li>View user profile containing liked, commented and uploaded posts</li>'

            . '</ul>'
            ,
            'code' => 'https://github.com/no0n3/fun_project'
        ],
        [
            'title' => 'Warcraft Legends',
            'contribution' => ['design', 'solo developer'],
            'imgs' => [
                '/images/projects/w3legends/1.jpg',
                '/images/projects/w3legends/2.jpg',
                '/images/projects/w3legends/3.jpg',
                '/images/projects/w3legends/4.jpg',
                '/images/projects/w3legends/5.svg.png',
                
            ],
            'technology' => ['Jass2, Warcraft3 World Editor',],
            'descr' => 'DOTA like MOBA map for the Warcraft 3 game (maps are custom made game mods with the World Editor tool which is shipped with the game). Inspired by DOTA, League of Legends and World of Warcraft.'
            . '<br/>Game basics and features: '
            . '<ul>'
            . '<li>There are 2 factions (teams). The Horde and The Alliance</li>'
            . '<li>There are 3 lanes which are the main way of getting to the enemy base and every 30 seconds waves of creeps spawn</li>'
            . '<li>On every lane there is 2 towers per team</li>'
            . '<li>Main obejective - destroy enemy base. To destroy the base first all towers in the enemy lane must be destroyed to enter the base.</li>'
            . '<li>The player controls a single character in a team who compete versus another team of players</li>'
            . '<li>Maximum 5 players per team</li>'
            . '<li>In between the lanes is an uncharted area called the "jungle."</li>'
            . '<li>In the jungle there are creep camps that can be killed for gold or experience</li>'
            . '<li>Ussualy in the MOBA games there are many characters from which the player chooses one and playes with. In Wacraft Legends there are classes which the player chooses and creates build from 20-30 class fantasy spells</li>'
            . '<li>When a player kills creeps or player characters (heroes) he gets gold and experiece. There are 18 hero levels that are gained from certain amount of experience</li>'
            . '<li>Players can buy different consumables or items with gold. They also can combinatione different items to create more powerful items</li>'

            . '</ul>',
        ],
        [
            'title' => 'Flappy Flight demo game',
            'contribution' => ['design', 'solo developer'],
            'imgs' => [
                '/images/projects/flappy/1.png',
            ],
            'technology' => ['JavaScript',],
            'descr' => 'Simple Flappy flight browser game',
            'code' => 'https://github.com/no0n3/flappy_flight'
        ],
        [
            'title' => 'Game of Life',
            'contribution' => ['design', 'solo developer'],
            'imgs' => [
                '/images/projects/gof/1.png',
            ],
            'technology' => ['JavaScript ES6, Node.js, Angular.js',],
            'descr' => 'Simple game of life example with fullstack JavaScript. Part of an assignment',
        ],
        [
            'title' => 'Console snake game',
            'contribution' => ['design', 'solo developer'],
            'imgs' => [
                '/images/projects/snake/1.png',
            ],
            'technology' => ['Python',],
            'descr' => 'Simple Snake console game',
            'code' => 'https://github.com/no0n3/snake-game'
        ],
        [
            'title' => 'Game opinion website',
            'imgs' => [
                '/images/projects/game/1.jpg',
                '/images/projects/game/2.jpg',
                '/images/projects/game/3.jpg',
            ],
            'contribution' => ['design', 'solo developer'],
            'technology' => ['PHP', 'Yii2 framework',],
            'note' => 'No found XSS, SQL Injection vulnerabilities',
            'descr' => 'A simple web application for posting opinions and statuses about games. This project is part of a university cource assignment for SEO.',
            'code' => 'https://github.com/no0n3/game_opinion'
        ],
        [
            'title' => 'vivanof.com',
            'imgs' => [
                '/images/projects/portfolio/1.jpg',
            ],
            'contribution' => ['design', 'solo developer'],
            'technology' => ['custom framework',],
            'descr' => 'Simple personal website and portfolio.',
        ],
    ],
    'skills' => [
        [
            'name' => 'Javascript ES6+. Always.',
            'percent' => '75',
        ],
        [
            'name' => 'Typescript',
            'percent' => '50',
        ],
        [
            'name' => 'Node.js',
            'percent' => '50',
        ],
        [
            'name' => 'Java',
            'percent' => '65',
        ],
        [
            'name' => 'PHP',
            'percent' => '80',
        ],
        [
            'name' => 'OOP',
            'percent' => '90',
        ],
        [
            'name' => 'HTML',
            'percent' => '50',
        ],
        [
            'name' => 'CSS',
            'percent' => '50',
        ],
        // [
        //     'name' => 'JQuery',
        //     'percent' => '55',
        // ],
        [
            'name' => 'Angular 5+',
            'percent' => '50',
        ],
        [
            'name' => 'AngularJS',
            'percent' => '35',
        ],
        // [
        //     'name' => 'MVC',
        //     'percent' => '90',
        // ],
        [
            'name' => 'Yii2',
            'percent' => '70',
        ],
        // [
        //     'name' => 'CodeIgniter',
        //     'percent' => '15',
        // ],
        // [
        //     'name' => 'Symfony3',
        //     'percent' => '15',
        // ],
        // [
        //     'name' => 'Laravel5',
        //     'percent' => '15',
        // ],
        // [
        //     'name' => 'Zend2',
        //     'percent' => '10',
        // ],
        [
            'name' => 'Git',
            'percent' => '65',
        ],
        [
            'name' => 'SQL',
            'percent' => '70',
        ],
        [
            'name' => 'MySQL',
            'percent' => '70',
        ],
        // [
        //     'name' => 'PHPUnit',
        //     'percent' => '50',
        // ],
        // [
        //     'name' => 'XML & Json',
        //     'percent' => '50',
        // ],
        [
            'name' => 'Algorithms & Data Structures',
            'percent' => '50',
        ],
    ]
];
