<?php
ini_set('dispaly_errors', 0);

if (isset($_SERVER['REQUEST_METHOD']) && 'POST' === $_SERVER['REQUEST_METHOD']) {
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $msg = isset($_POST['msg']) ? $_POST['msg'] : null;

    $response = ['success' => true];

    if (
        '' === trim($name) ||
        '' === trim($email) ||
        '' === trim($msg) ||
        false === filter_var($email, FILTER_VALIDATE_EMAIL)
    ) {
        $response['success'] = false;
    } else {
        $headers = "From: $email\r\n";
        mail('zivanof@gmail.com', 'Contct from portfolio', $msg, $headers);
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

$githubUrl = 'https://github.com/no0n3';
$linkedinUrl = 'https://www.linkedin.com/in/velizar-ivanov-129489a2/';

$title = 'Velizar Ivanov - Software Developer';
$description = 'Hi! I\'m Velizar and I\'m a Software Developer.';
$img = 'http://vivanof.com/images/sir.png';

$data = require_once '../data/data.php';

$books = isset($data['books']) ? $data['books'] : [];
$projects = isset($data['projects']) ? $data['projects'] : [];
$skills = isset($data['skills']) ? $data['skills'] : [];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= $title ?></title>
        <meta name="description" content="<?= $descr ?>">
        <meta property="og:title" content="<?= $title ?>">
        <meta property="og:description" content="<?= $descr ?>">
        <meta property="twitter:title" content="<?= $title ?>">
        <meta property="twitter:description" content="<?= $descr ?>">
        <meta property="og:image" content="<?= $img ?>">
        <meta name="twitter:image" content="<?= $img ?>">
        <link rel="image_src" href="<?= $img ?>">

        <link rel="stylesheet" type="text/css" href="css/all.css" />
        <link rel="stylesheet" type="text/css" href="css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
        <link rel="shortcut icon" href="images/sir.ico">
    </head>
    <body>
        <div id="app-load" style="opacity: 1;">
            <div class="app-load-c1">
            </div>
        </div>
        <div id="app">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="#about" id="about-btn" class="vi-nav-btn"><i class="fa fa-user" aria-hidden="true"></i> About Me<span class="sr-only">(current)</span></a></li>
                            <li><a href="#skills" id="skills-btn" class="vi-nav-btn"><i class="fa fa-book" aria-hidden="true"></i> Skills</a></li>
                            <li><a href="#projects" id="proj-btn" class="vi-nav-btn"><i class="fa fa-suitcase" aria-hidden="true"></i> Projects</a></li>
                            <li><a href="#contact" id="contact-btn" class="vi-nav-btn"><i class="fa fa-envelope" aria-hidden="true"></i> Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div>
                <h1 id="dev-text"><span id="dev-text-c"></span></h1>
                <h3 class="wellcome-about">
                    <span class="wellcome-about-cont1">
                        <span class="vi-while vi-code">while</span> (<span class="vi-code vi-var">me</span><span class="vi-code">.</span><span class="vi-code">bored()) {</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="vi-comment vi-code">// me.play(YuGiOh); // shadow realm and stuff</span><br/>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="vi-comment vi-code">// me.liveDangerously();</span><br/>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="vi-code vi-var">me</span><span class="vi-code">.</span><span class="vi-code">code();</span> <span class="vi-code vi-comment">// lets keep it simple</span><br/>
                        <span class="vi-code">}</span><br/>
                    </span>
                </h3>
            </div>
        </div>

        <div class="dialog about-dialog v">
            <div class="dialog-header">
                <div class="dialog-b-c">
                    <a href="javascript:void(0)" class="vi-d-size"><i class="fa fa-window-maximize" aria-hidden="true"></i></a>
                    <a href="#" class="vi-d-close"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div class="dialog-wrap">
                <div class="dialog-body-cont">
                    <p>
                        I'm Velizar, a 26 year old Software Developer from Sofia, Bulgaria.
                    </p>
                    <div>
                        <div class="about-right-c">
                            I'm passionate about solving challenging problems and coding, mainly with Javascript and PHP.
                            I strive to produce clean, scalable and testable code and
                            some of my biggest interests are security and networking. In my spare time I usually work on my persenal
                            projects or try to learn some new technologies.
                        </div>
                        <div class="about-left-c">
                            <div style="text-align: center;">
                                Recently read books
                            </div>
                            <div class="books-cont">
                                <div class="slider book-slider">
                                    <?php foreach ($books as $book) : ?>
                                        <?php if (isset($book['link'])) : ?>
                                            <a href="<?= $book['link'] ?>"><img class="book-img" src="<?= $book['img'] ?>" /></a>
                                        <?php else : ?>
                                            <img class="book-img" src="<?= $book['img'] ?>" />
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dialog skills-dialog v">
            <div class="dialog-header">
                <div class="dialog-b-c">
                    <a href="javascript:void(0)" class="vi-d-size"><i class="fa fa-window-maximize" aria-hidden="true"></i></a>
                    <a href="#" class="vi-d-close"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div class="dialog-wrap">
                <div class="dialog-body-cont">
                    <h1 class="vi-dialog-title">
                        <span class="vi-dialog-title-text">Skills</span>
                    </h1>
                    <div style="width: 100%; position: relative; ">
                        <?php $sc = array_chunk($skills, round(count($skills) / 2)); ?>
                        <?php foreach ($sc as $sc_i) : ?>
                            <div class="dialog-skill-col">
                            <?php foreach ($sc_i as $k => $v) : ?>
                                    <div style="margin-bottom: 5px; ">
                                        <div style="position: relative;"><?= $v['name'] ?>
                                            <!--<span style="float: right;"><?= $v['percent'] ?>%</span>-->
                                        </div>
                                        <div class="skill-bg">
                                            <div class="skill" title="<?= $v['percent'] ?>%" data-sp="<?= $v['percent'] ?>"></div>
                                        </div>
                                    </div>
                            <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </div>
        </div>

        <div class="dialog projects-dialog v">
            <div class="dialog-header">
                <div class="dialog-b-c">
                    <a href="javascript:void(0)" class="vi-d-size"><i class="fa fa-window-maximize" aria-hidden="true"></i></a>
                    <a href="#" class="vi-d-close"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div class="dialog-wrap">
                <div class="dialog-body-cont">
                    <h1 class="vi-dialog-title"><span class="vi-dialog-title-text">Projects</span></h1>
                    <h3>Some of my projects.</h3>
                    <div style="width: 100%;">
                        <div id="proj-cont">
                            <?php $i = 0;
                            foreach ($projects as $project) : ?>
                                <div id="proj-<?= $i ?>" class="project-item">
                                    <h3 class="project-title project-label"><?= htmlspecialchars($project['title']) ?></h3>
                                    <div class="project-label proj-imgs-cont">
                                        <div id="proj-imgs-<?= $i + 1 ?>" class="project-slider project-slider-<?= $i ?>" style="position: relative;">
                                            <?php if (isset($project['imgs'])) : ?>
                                                <?php foreach ($project['imgs'] as $img) : ?>
                                                    <!--<div class="proj-imgx" style="background: url('<?= $img ?>'); background-size: cover; background-repeat: no-repeat; height: 400px;"></div>-->
                                                    <img class="project-img" style="width: 100%;"src="<?= $img ?>" />
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div style="margin-top: 5px;">
                                        <div class="project-label">
                                            <b>Contribution:</b> <?= implode(', ', $project['contribution']) ?>
                                        </div>
                                        <?php if (isset($project['technology'])) : ?>
                                            <div class="project-label">
                                                <b>Technology:</b> <?= implode(', ', $project['technology']) ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="project-label">
                                            <b>Description:</b> <?= htmlspecialchars($project['descr']) ?>
                                        </div>
                                        <?php if (isset($project['note'])) : ?>
                                            <div class="project-label">
                                                <b>Note:</b> <?= htmlspecialchars($project['note']) ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (isset($project['url'])) : ?>
                                            <div class="project-label">
                                                <i class="fa fa-link"></i>
                                                <a href="<?= $project['url'] ?>">preview website</a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (isset($project['code'])) : ?>
                                            <div class="project-label">
                                                <i class="fa fa-link"></i>
                                                <a href="<?= $project['code'] ?>">view source code</a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php $i++;
                            endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dialog contact-dialog v">
            <div class="dialog-header">
                <div class="dialog-b-c">
                    <a href="javascript:void(0)" class="vi-d-size"><i class="fa fa-window-maximize" aria-hidden="true"></i></a>
                    <a href="#" class="vi-d-close"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div class="dialog-wrap">
                <div class="dialog-body-cont">
                    <h1 class="vi-dialog-title"><span class="vi-dialog-title-text">Contact</span></h1>
                    <div>
                        <h3>Feel free to leave me a message.</h3>
                        <p>I'd be happy to answer any of your questions, just leave an email and a name.</p>
                    </div>
                    <form>
                        <div style="position: relative;display: inline-block; width: 100%;">
                            <div style="margin-bottom: 10px;">
                                <div class="vi-contact-inp-g" style="position: relative; ">
                                    <input id="vi-contact-name" class="vi-contact-inp" name="email" placeholder="Your name" type="text">
                                    <i class="fa fa-user vi-contact-i"></i>
                                </div>
                                <div><span id="vi-contact-name-error" class="error-field"></span></div>
                            </div>
                            <div style="margin-bottom: 10px;">
                                <div class="vi-contact-inp-g" style="position: relative;">
                                    <input id="vi-contact-email" class="vi-contact-inp" name="email" placeholder="Your email" type="text">
                                    <i class="fa fa-envelope vi-contact-i"></i>
                                </div>
                                <div><span id="vi-contact-email-error" class="error-field"></span></div>
                            </div>
                            <span style="clear: both;"></span>
                        </div>
                        <br/>
                        <div>
                            <div class="vi-contact-inp-g" style="/*! padding: 5px; */position: relative; ">
                                <textarea id="vi-contact-msg" class="vi-contact-inp vi-contact-ta" name="email" placeholder="Your message" style="resize: none;" type="text"></textarea>
                                <i class="fa fa-comment vi-contact-i" style="height: 100%;width: 25px;text-align: center;position: absolute;padding: 8px 0px;/*!  *//*!  */"></i>
                            </div>
                            <div><span id="vi-contact-msg-error" class="error-field"></span></div>
                        </div>
                        <div style="margin-top: 15px;">
                            <button id="vi-contact-send-btn">send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="dialog msg-dialog v">
            <div class="dialog-header">
                <div class="dialog-b-c">
                    <a href="javascript:void(0)" class="vi-d-size"><i class="fa fa-window-maximize" aria-hidden="true"></i></a>
                    <a href="#" class="vi-d-close"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div class="dialog-wrap">
                <div class="dialog-body-cont">
                    <div id="msgs"></div>
                    <div>
                        <textarea style="width: 100%;"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="dialog fb-dialog v">
            <div class="dialog-header">
                <div class="dialog-b-c">
                    <a href="javascript:void(0)" class="vi-d-size"><i class="fa fa-window-maximize" aria-hidden="true"></i></a>
                    <a href="#" class="vi-d-close"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div class="dialog-wrap">
                <div class="dialog-body-cont">
                    <div style="width: 100%; position: relative; ">
                        <h3>I don't have facebook.</h3>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="alert-cont">
                <div class="alert-cont-right">
                    <div class="vi-hidden vi-a vi-a-success">
                        <div class="alert-msg">
                            <span>Your message has been successfully send.</span>
                        </div>
                    </div>
                    <div class="vi-hidden vi-a vi-a-error">
                        <div class="alert-msg">
                            <span>There was an error sending you message.</span>
                        </div>
                    </div>
                    <div class="vi-hidden vi-a vi-a-greet">
                        <div class="alert-msg">
                            <h3>Hello thereǃ</h3>
                        </div>
                    </div>
                </div>
                <div class="alert-cont-left">
                    <div class="vi-hidden vi-a vi-a-suggest">
                        <div class="alert-msg">
                            If you find any issues or think there is room for improvements feel free to contact me. I'm always open to suggestions.
                        </div>
                    </div>
                    <div class="vi-hidden vi-a vi-a-skill">
                        <div class="alert-msg">
                            If you know an interesting technology that I have not listed feel free to share it with me.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-cont">
            <a href="https://twitter.com/search/?q=%23codeception" class="vi-footer-start">#codeception</a>
            <a href="<?= $githubUrl ?>" target="_blank" class="vi-social-link"><i aria-hidden="true" class="fa fa-github"></i></a>
            <a href="<?= $linkedinUrl ?>" target="_blank" class="vi-social-link"><i aria-hidden="true" class="fa fa-linkedin"></i></a>
        </div>

        <script src="js/all.js"></script>
        <script>
            $(function () {
                var SUGGEST_ALERT_OPEN_DELAY = 8000;
                var SKILLS_ALERT_OPEN_DELAY = 3000;

                for (var i = 1; i <= <?= count($projects) ?>; i++) {
                    let projImgs = document.getElementById('proj-imgs-' + i);
                    var viewer = new Viewer(projImgs, {
                        navbar: false,
                        toolbar: false,
                        movable: false,
                        zoomable: false,
                        rotatable: false,
                        scalable: false,
                    });
                }

                var visit = 0;
                if ('undefined' === typeof (Storage)) {
                    // my `1` keyboard key doesn't work :((( and was too lazy to copy exclamation mark symbol
                } else {
                    visit = localStorage.getItem('_visit');

                    if (null == visit) {
                        visit = 0;
                    }

                    localStorage.setItem('_visit', 1 + parseInt(visit))
                }

                var suggestAlert = new app.Alert({
                    selector: '.vi-a-suggest'
                });
                var skillAlert = new app.Alert({
                    selector: '.vi-a-skill'
                });
                var errorAlert = new app.Alert({
                    selector: '.vi-a-error'
                });
                (function () {
                    var contact = new app.Contact({
                        prefix: 'vi-contact',
                        successCallback: function () {
                            successAlert.show({
                                closeDelay: 5000,
                            });
                        },
                        failCallback: function () {
                            errorAlert.show({
                                closeDelay: 5000,
                            });
                        }
                    });

                    var txtEle = document.getElementById('dev-text-c');
                    var str = (0 === visit ? "Hello!" : "Wellcome back!") + " I'm Velizar and I'm a Software Developer.";
                    var f = function (i) {
                        if (undefined === str[i]) {
                            $('#dev-text-c').css({
                                borderBottom: '4px solid #fff',
                                marginBottom: '0px',
                            });
                            return;
                        }

                        txtEle.innerHTML = txtEle.innerHTML + str[i];
                        setTimeout(function () {
                            f(i + 1);
                        }, 70);
                    };
                    if (txtEle) {
                        f(0);
                    }
                })();

                var successAlert = new app.Alert();
                var greetAlert = new app.Alert({
                    selector: '.vi-a-greet',
                    width: 200,
                    height: 100
                });
                setTimeout(function () {
                    suggestAlert.show({
        //            closeDelay: 5000
                    });
                }, SUGGEST_ALERT_OPEN_DELAY);

                var d = new app.Dialog({
                    selector: '.skills-dialog',
                    beforeOpen: function () {
                        for (var i in skills) {
                            $("[data-sp='" + i + "']").each(function () {
                                $(this).removeClass('skill-' + i);
                            });
                        }
                    }
                });
                var bookSliderInit = false;
                var aboutDialog = new app.Dialog({
                    selector: '.about-dialog',
                    height: 450,
                });
                var contactDialog = new app.Dialog({
                    selector: '.contact-dialog',
                    height: 450
                });
                var msgDialog = new app.Dialog({
                    selector: '.msg-dialog',
                    width: 400,
                    height: 350
                });
                var fbD = new app.Dialog({
                    selector: '.fb-dialog',
                    width: 300,
                    height: 200,
                });
                var projectDialog = new app.Dialog({
                    selector: '.projects-dialog',
                    width: 1200,
                    height: 730
                });

                app.init({
                    showAbout: showAboutDialog,
                    showSkills: showSkillD,
                    showContact: showContactsD,
                    showProjects: showProjectsD
                });

                var skillsOpenedBefore = false;
                function showSkillD(event) {
                    d.show({
                        origin: event ? event.target : null,
                        callback: function () {
                            for (var i in skills) {
                                $("[data-sp='" + i + "']").each(function () {
                                    $(this).addClass('skill-' + i);
                                });
                            }
                            if (false === skillsOpenedBefore) {
                                skillsOpenedBefore = true;
                                setTimeout(function () {
                                    skillAlert.show({
                                        closeDelay: 15000
                                    });
                                }, SKILLS_ALERT_OPEN_DELAY);
                            }
                        }
                    });
                }

                function showAboutDialog(event) {
                    aboutDialog.show({
                        origin: event ? event.target : null,
                        callback: function () {
                            if (false === bookSliderInit) {
                                $('.book-slider').slick({
                                    infinite: true,
                                    speed: 300,
                                    slidesToShow: 1,
                                    adaptiveHeight: true
                                });

                                bookSliderInit = true;
                            }
                        }
                    });
                }
                function showContactsD(event) {
                    contactDialog.show({
                        origin: event ? event.target : null,
                    });
                }
                function showProjectsD(event, func) {
                    projectDialog.show({
                        origin: event ? event.target : null,
                        callback: function () {
                            if (false === sInit) {
                                $('.project-slider').slick({
                                    infinite: true,
                                    speed: 300,
                                    slidesToShow: 1,
                                    adaptiveHeight: true
                                });
                                if ('function' === typeof func) {
                                    func();
                                }

                                sInit = true;
                            }
                        }
                    });
                }
                $('#about-btn').on('click', function (e) {
                    showAboutDialog(e);
                });
                $('#skills-btn').on('click', function (e) {
                    showSkillD(e);
                });

                $('#fb-btn').on('click', function (e) {
                    fbD.show({
                        origin: e.target,
                    });
                });
                $('#contact-btn').on('click', function (e) {
                    showContactsD(e);
                });
                var sInit = false;
                $('#proj-btn').on('click', function (e) {
                    showProjectsD(e);
                });

                var _skills = <?= json_encode($skills); ?>;
                var skills = {};
                for (var i in _skills) {
                    if (null == skills[ _skills[i]['percent'] ]) {
                        skills[ _skills[i]['percent'] ] = [];
                    }

                    skills[ _skills[i]['percent'] ].push(_skills[i])
                }

            });
        </script>
    </body>
</html>
