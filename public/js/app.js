var app = (function() {
    $(document).ready(function() {
        $('#app-load').animate({opacity: 0}, 1000, function() {
            $(this).hide();
        });
    });

    var isInit = false;
    var $window = $(window);

    var dialogs = [];
    var alerts = [];
    var activeDialog = null;

    $window.on('resize', function() {
        for (var i in dialogs) {
            var dialog = dialogs[i];
            if (dialog.isActive() && false === dialog.isMaximized()) {
                dialog.reposition();
            }
        }
        for (var i in alerts) {
            if (alerts[i].isActive()) {
                alerts[i].resize();
            }
        }
    });

    function isFunction(data) {
        return 'function' === typeof data;
    }

    return {
        isInit : isInit,
        init: function(data) {
            if (isInit) {
                return;
            }

            isInit = true;

            var hash = window.location.hash.substr(1);

            var func = null;

            var projectHash = 'projects';

            if ('about' === hash) {
                if ('function' === typeof data.showAbout) {
                    data.showAbout();
                }
            } else if ('skills' === hash) {
                if ('function' === typeof data.showSkills) {
                    data.showSkills();
                }
            } else if ('contact' === hash) {
                if ('function' === typeof data.showContact) {
                    data.showContact();
                }
            } else if (
                0 === hash.indexOf(projectHash)
//                'projects' === hash
            ) {
                var projId = null;
                if (hash.length > projectHash.length) {
                    var tl = 0 === hash.indexOf(projectHash + '-') ?
                        projectHash.length + 1 :
                        projectHash.length;

                    var projId = hash.substr(tl);
                    if (parseInt(projId, 10)) {
                        var p = $('#proj-' + projId);

                        func = function() {
                            $('.projects-dialog .dialog-wrap').animate({
                                scrollTop: p[0].offsetTop//p.offset().top - p.parent().offset().top
                            }, 500);
                        };
                    }
                }

                if ('function' === typeof data.showProjects) {
                    data.showProjects(null, func);
                }
            }
        },
        Dialog : (function() {
            var DIALOG_DEFAULT_WIDTH = 700;
            var DIALOG_DEFAULT_HEIGHT = 500;

            var dialogAnim = false;
            var activeClass = 'vi-d-active';
            var activeSelector = '.' + activeClass;

            function dataToPx(data) {
                var _ = {};
                for (var i in data) {
                    if (data[i] !== undefined) {
                        _[i] = data[i] + 'px';
                    }
                }
                return _;
            }

            function setEleBounds(e, data) {
                e.css(dataToPx(data));
            }

            function getEndData() {
                var _ = getDefData();
                var w = _.w;
                var h = _.h;
                var ww = _.ww;
                var wh = _.wh;
                var endData = {
                    width: 0,
                    height: 0,
                    left: (ww / 2),
                    top: (wh / 2)
                };
                return endData;
            }

            function getStartData(width, height) {
                var _ = getDefData(width, height);

                var w = _.w;
                var h = _.h;
                var ww = _.ww;
                var wh = _.wh;
                var startData = {
                    width: w,
                    height: h,
                    left: (ww / 2 - w / 2),
                    top: (wh / 2 - h / 2),
                    w : w,
                    h : h,
                };
                return startData;
            }

            function getDefData(width, height) {
                var w = width || DIALOG_DEFAULT_WIDTH;
                var h = height || DIALOG_DEFAULT_HEIGHT;
                var ww = $window.width();
                var wh = $window.height();
                if (w > ww) w = ww;
                if (h > wh) h = wh;

                return {
                    w : w,
                    h : h,
                    ww : ww,
                    wh : wh,
                }
            }

            function showDialog(d, rect, showCallback, w, h) {
                var startData = getStartData(w, h);
                var endData = getEndData();
                var $header = d.find('.dialog-header');

                var headerH = 42;//$header.outerHeight();
//                console.log($header)
//$header.each(function() {
//    console.log('ddd', $(this).height())
//})
                var $dialogBody = d.find('.dialog-wrap');
//                console.log('header', $header.outerHeight(), 'dialog', startData.height, 'body', $dialogBody.height())
//                $dialogBody.height( startData.height - headerH )

                if (null == rect) {
                    rect = {
                        left : $window.width() / 2 ,
                        top : $window.height() / 2 ,
                    };
                }

                var _t = {};
                _t.left = rect.left;
                _t.top = rect.top;
                _t.width = 0;
                _t.height = 0;

                setEleBounds(d, _t)
                d.removeClass('v')

                d.addClass(this.activeSelector)
                d.animate(dataToPx(startData), 300, function() {
                    if ('function' === typeof showCallback) {
                        showCallback()
                    }
                });
            }

            function hideDialog(callback, closeCallback) {
                var d = $('.vi-d-active')
                $('.vi-d-maximized').removeClass('vi-d-maximized')

                if (d.length > 0) {
                    var endData = getEndData();
                    d.animate(dataToPx(endData), 300, function () {
                        d.addClass('v')
                        d.removeClass('vi-d-active')
                        callFunc()
                        
                    });
                } else {
                    callFunc();
                }

                function callFunc() {
                    if ('function' === typeof callback) {
                        callback();
                    }
                }
            }

            function maximizeData() {
                return {
                    width: '100%',
                    height: '100%',
                    left: '0px',
                    top: '0px',
                };
            }

            function Dialog(data) {
                if (this) {
                    dialogs.push(this);
                }

                var animate = false;
                data = data || {};
                this.init(data);

                this.isMaximized = function() {
                    return this.$dialogEle.hasClass('vi-d-maximized');
                };

                this.show = function(data) {
                    var self = this;
                    if (activeDialog === self) {
                        self.hide();
                        return;
                    }
                    if (activeDialog && activeDialog.isActive()) {
                        activeDialog.hide({
                            callback: _open
                        });
                    } else {
                        _open();
                    }
                    function _open() {
                    if (true === animate) {
                        return;
                    }
                    animate = true;

                    if ('function' === typeof self.beforeOpen) {
                        self.beforeOpen();
                    }
                    data = data || {};

                    self.$dialogEle.removeClass('vi-d-maximized');
                    var $ch = self.maximizeBtn.children().first();
//                    $ch.removeClass('fa-window-minimize');
//                    $ch.addClass('fa-window-maximize');

                    this.activeClass = data.activeClass || 'vi-d-active';

                    var rect = null;
                    if (data.origin) {
                        rect = data.origin.getBoundingClientRect();
                    }
                    activeDialog = self;
                    showDialog.call(self, self.$dialogEle, rect, function() {
                        animate = false;

                        if ('function' === typeof data.callback) {
                            data.callback();
                        }
                    }, self.width, self.height);
                    }
                };

                this.hide = function(data) {
                    if (true === animate) {
                        return;
                    }
                    animate = true;

                    data = data || {};
                    var callback = data.callback;
                    var self = this;
                    var $dialog = this.$dialogEle;
                    if (this.isActive()) {
                        var endData = getEndData();
                        $dialog.animate(dataToPx(endData), 300, function () {
                            $dialog.addClass('v');
                            $dialog.removeClass(self.activeClass);
                            animate = false;
                            activeDialog = null;
                            callFunc();
                        });
                    }

                    function callFunc() {
                        if ('function' === typeof callback) {
                            callback();
                        }
                    }
                };
            }

            Dialog.prototype.reposition = function() {
                var _startData = getStartData(this.width, this.height);
                setEleBounds(this.$dialogEle, _startData);
            };

            Dialog.prototype.init = function(data) {
                var self = this;
                self.selector = data.selector;
                self.closeSelector = data.closeSelector || '.vi-d-close';
                self.maximizeSelector = data.maximizeSelector || '.vi-d-size';
                self.closeSelector = data.closeSelector || '.vi-d-close';
                self.activeSelector = data.activeSelector || '.vi-d-active';

                self.beforeOpen = data.beforeOpen || null;

                self.$dialogEle = $(self.selector);
                self.width = data.width || DIALOG_DEFAULT_WIDTH;
                self.height = data.height || DIALOG_DEFAULT_HEIGHT;

                $(self.selector + ' ' + self.closeSelector).on('click', function() {
                    self.hide();
                });

                self.maximizeBtn = $(self.selector + ' ' + self.maximizeSelector);
                self.maximizeBtn.on('click', function() {
                    self.maximize();
                });
            },
            Dialog.prototype.maximize = function($d) {
                var self = this;

                        if (self.$dialogEle.hasClass('vi-d-maximized')) {
                            self.minimize();

                            return;
                        }

                        self.$dialogEle.animate(maximizeData(), 300, function () {
                            self.$dialogEle.addClass('vi-d-maximized');
                            var $ch = self.maximizeBtn.children().first();
//                            $ch.removeClass('fa-window-maximize')
//                            $ch.addClass('fa-window-minimize')
                        });
            };
            Dialog.prototype.minimize = function() {
                var self = this;

                    this.$dialogEle.animate(dataToPx(getStartData()), 300, function () {
                        self.$dialogEle.removeClass('vi-d-maximized');
                        var $ch = self.maximizeBtn.children().first();
//                        $ch.removeClass('fa-window-minimize')
//                        $ch.addClass('fa-window-maximize')
                    });
                },

            Dialog.prototype.isActive = function() {
                return this.$dialogEle.hasClass(this.activeSelector);
            };
            Dialog.prototype.toggle = function(data) {
                   var dialogSelector = data.selector,
                       e = data.event,
                       showCallback = data.showCallback,
                       closeCallback = data.closeCallback,
                       beforeOpen = data.beforeOpen,
                       width = data.width || DIALOG_DEFAULT_WIDTH,
                       height = data.height || DIALOG_DEFAULT_HEIGHT;
DIALOG_DEFAULT_HEIGHT = height;
DIALOG_DEFAULT_WIDTH = width;
                   if (dialogAnim) {
                        return ;
                    }
                    dialogAnim = true;
                    var $d = $(dialogSelector)
                    var isOpen = $d.hasClass(activeClass);
                    if (!isOpen && 'function' === typeof beforeOpen) {
                        beforeOpen();
                    }
                    hideDialog(function() {
                        if (!isOpen) {
                            var rect = e ? e.target.getBoundingClientRect() : null;
                            showDialog($d, rect, showCallback, width, height)
                        }
                        dialogAnim = false;
                    }, function() {
                        if ('function' === typeof closeCallback)
                            closeCallback();
                    });
                }

            return Dialog;
        })(),
        Alert: (function() {
            function getSize(w, h) {
                var ww = $window.width();
                var wh = $window.height();
                if (w > ww) w = ww - 20;
                if (h > wh) w = wh;
                return {
                    width : w
                };
            }

            function Alert(data) {
                data = data || {};
                alerts.push(this);
                var self = this;

                var active = false;

                this.selector = data.selector || '.vi-a-success';
                this.$element = $(this.selector);

                self.width = data.width || 300;
                self.height = data.height || self.$element.height();

                self.$element.on('click', function() {
                    self.hide();
                });

                var timeout = null;

                function setCloseTimeout(time) {
                    timeout = setTimeout(function() {
                        self.hide();
                    }, time);
                }

                this.resize = function() {
                    self.$element.css(getSize(self.width, self.height));
                };

                this.show = function(data) {
                    data = data || {};

                    var size = getSize(self.width, self.height);
                    self.$element.css({
                        width : size.width,
                        height: 0
                    });
                    self.$element.removeClass('vi-hidden');

                    self.$element.animate({
                        height: self.height
                    }, 500, function() {
                        active = true;
                        self.$element.css({height: 'auto'});
                        if (data.closeDelay) {
                            setCloseTimeout(data.closeDelay);
                        }
                    });
                };
                this.hide = function() {
                    self.$element.animate({
                        height: 0
                    }, 500, function() {
                        active = false;
                        self.$element.addClass('vi-hidden');
                    });
                };
                this.isActive = function() {
                    return active;
                };
            }

            return Alert;
        })(),
        Contact: (function() {
            function Contact(data) {
                data = data || {};
                var self = this;

                var inputs = [];

                var $nameInp = $('#' + data.prefix + '-name');
                var $emailInp = $('#' + data.prefix + '-email');
                var $msgArea = $('#' + data.prefix + '-msg');
                var $sendBtn = $('#' + data.prefix + '-send-btn');

                var errorFields = {
                    name: $('#' + data.prefix + '-name-error'),
                    email: $('#' + data.prefix + '-email-error'),
                    msg: $('#' + data.prefix + '-msg-error'),
                };

                inputs.push($nameInp);
                inputs.push($emailInp);
                inputs.push($msgArea);

                $sendBtn.on('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    var name = $nameInp.val();
                    var email = $emailInp.val();
                    var msg = $msgArea.val();

                    var valid = true;

                    function setError(prop, msg) {
                        var $ef = errorFields[prop];
                        if ($ef) {
                            $ef.html(msg);
                        }
                    }
                    function clearError(prop) {
                        var $ef = errorFields[prop];
                        if ($ef) {
                            $ef.html('');
                        }
                    }

                    if (0 >= name.length) {
                        valid = false;
                        setError('name', 'Name cannot be empty.')
                    } else {
                        clearError('name');
                    }
                    if (0 >= email.length) {
                        valid = false;
                        setError('email', 'Email cannot be empty.')
                    } else if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email)) {
                        setError('email', 'Invalid email.')
                        valid = false;
                    } else {
                        clearError('email');
                    }
                    if (0 >= msg.length) {
                        setError('msg', 'Message cannot be empty.')
                        valid = false;
                    } else {
                        clearError('msg');
                    }

                    if (valid) {
                        self.send();
                    }

                    return false;
                });

                self.send = function() {
                    if (false === self.validate()) {
                        return;
                    }

                        $.post('/', {
                            name: $nameInp.val(),
                            email: $emailInp.val(),
                            msg: $msgArea.val()
                        }, function(response) {
                            if (false == response || false == response.success) {
                                if (isFunction(data.failCallback)) {
                                    data.failCallback();
                                }
                            } else {
                                if (isFunction(data.successCallback)) {
                                    $nameInp.val('');
                                    $emailInp.val('');
                                    $msgArea.val('');

                                    data.successCallback();
                                }
                            }
                        });

return;
                    $.ajax(data.url, {
                        success: function() {
                            
                        }
                    });
                };
                self.validate = function() {
                    
                };
            }

            return Contact;
        })(),
        Chat: (function() {
            function Chat(data) {
                data = data || {};

                var client = new WebSocket('ws://localhost:8080/', 'echo-protocol');

                client.onerror = function() {
                    console.log('Connection Error');
                };

                client.onopen = function() {
                    console.log('WebSocket Client Connected');

                };

                client.onclose = function() {
                    console.log('echo-protocol Client Closed');
                };

                client.onmessage = function(e) {
                    if (typeof e.data === 'string') {
                        console.log('_1')
                        if ('sd' === e.data) {
                            console.log('_2')
                            if (isFunction(data.showDialog)) {
                                data.showDialog();
                                $('#msgs')
                                        .append($('<div>').html(e.data));
                                console.log('_3')
                            }
                        }
                        console.log("Received: '" + e.data + "'");
                    }
                };

                this.send = function(msg) {
                    console.log(msg)
                    if (client.readyState === client.OPEN) {
                        client.send(msg);
                    }
                };
            }

            return Chat;
        })()
    };
})();
