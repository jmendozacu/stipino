-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2016 at 06:34 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stipino_temp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `content` text NOT NULL,
  `category` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `published` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `permalink`, `intro`, `content`, `category`, `type`, `published`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Ovo je moj prvi blog post', 'ovo-je-moj-prvi-blog-post', '<p>Ovjde testiram rad blog posta, bloge radiš li?</p>', '<p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quam dolor, egestas sed sapien vel, eleifend porttitor dui. Morbi massa velit, dictum vitae condimentum id, placerat elementum urna. Nunc malesuada magna id erat imperdiet, eget congue ex ultrices. Nulla sit amet consectetur lorem. Sed rutrum lobortis purus, eu varius nisi porta at. Nulla vel est turpis. Pellentesque suscipit suscipit tellus a facilisis. Vestibulum placerat varius blandit. In viverra mauris eget purus iaculis, tristique blandit orci consectetur. Cras pharetra placerat magna, vitae interdum lorem dignissim vitae. Donec sit amet molestie quam. Aenean ipsum lorem, luctus a malesuada accumsan, dictum a libero. Ut dignissim, massa eu ultrices elementum, dolor erat ullamcorper magna, in tincidunt elit mauris non dui. Phasellus non sollicitudin est.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Mauris et vehicula purus, nec imperdiet enim. Pellentesque varius mi arcu, ac scelerisque lacus tristique vel. Pellentesque lobortis hendrerit sapien eu sollicitudin. Phasellus accumsan, sem ac rhoncus ornare, erat tortor eleifend ipsum, non sodales nisi ante varius tortor. Proin mollis dapibus dolor sed scelerisque. Sed condimentum lobortis lorem, id dignissim lectus. Praesent fermentum enim vel neque hendrerit consequat. In sed malesuada metus, sit amet pretium enim. Praesent ac velit et elit auctor gravida. Proin iaculis condimentum commodo. Aliquam pharetra, metus gravida fermentum placerat, augue dui scelerisque est, sit amet pulvinar tellus quam ut dui.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Curabitur nulla massa, molestie et tortor quis, imperdiet imperdiet lacus. Maecenas in tristique ligula. Cras semper non orci at lacinia. Quisque dapibus et tortor elementum molestie. Nam at imperdiet nisl. Pellentesque dignissim fringilla eros, nec feugiat odio aliquam at. Phasellus id tempor nisl, ac cursus metus. In hac habitasse platea dictumst. Sed sit amet sapien odio. Aenean at ipsum porttitor urna congue consequat at non sapien. Nullam varius lobortis arcu, non tempor augue euismod eu.</p>', 1, 'blog', 1, 'ovo-je-moj-prvi-blog-post-c4ca4-2016-10-24.jpg', '2016-10-03 13:30:48', '2016-10-24 15:52:28'),
(2, 'O nama', 'o-nama', '', '<section id="about-header">\n        <video id="bgvid" playsinline="" loop="">\n            <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->\n            <source src="video/stipo.webm" type="video/webm">\n        </video>\n        <div class="about-title">\n            <h1>O nama</h1>\n        </div>\n        <a href="#" title="Play video" class="play"></a>\n    </section>\n    <section id="about-main-text">\n        <div class="container">\n            <div class="row">\n                <h2>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt. Aliquam elit ante, malesuada id, tempor eu, gravida id, odio.</h2>\n            </div>\n        </div>\n    </section>\n    <section id="about-story">\n        <div class="container">\n            <div class="row">\n                <h3 class="text-center">Kako je sve počelo?</h3>\n                <div class="col-md-6 text-center">\n                    <img src="img/frontend/blog/stipo-post.jpg">\n                </div>\n                <div class="col-md-6">\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.\n                        <br>\n                        <br>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.\n                    </p>\n                </div>\n                <div class="col-md-12">\n                    <h3>Kako se nastavilo</h3>\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.\n                        <br>\n                        <br>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>\n                </div>\n                <div class="col-md-12">\n                    <h3>I onda je krenulo drukcije</h3>\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>\n                </div>\n                <div class="col-md-6">\n                    <div class="col-md-12 videowrapper">\n                        <iframe width="560" height="350" src="https://www.youtube.com/embed/9sEI1AUFJKw" frameborder="0" allowfullscreen=""></iframe>\n                    </div>\n                </div>\n                <div class="col-md-6">\n                    <div class="col-md-12 videowrapper">\n                        <iframe width="560" height="350" src="https://www.youtube.com/embed/e6EkA19TTis" frameborder="0" allowfullscreen=""></iframe>\n                    </div>\n                </div>\n                <div class="col-md-12">\n                    <p>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>\n                </div>\n            </div>\n        </div>\n    </section>\n    <section id="about-videowell">\n        <div class="container-video">\n            <div class="row">\n                <div class="col-md-4">\n                    <div class="col-md-12 videowrapper">\n                        <iframe width="560" height="350" src="https://www.youtube.com/embed/9sEI1AUFJKw" frameborder="0" allowfullscreen=""></iframe>\n                    </div>\n                </div>\n                <div class="col-md-4">\n                    <div class="col-md-12 videowrapper">\n                        <iframe width="560" height="350" src="https://www.youtube.com/embed/e6EkA19TTis" frameborder="0" allowfullscreen=""></iframe>\n                    </div>\n                </div>\n                <div class="col-md-4">\n                    <div class="col-md-12 videowrapper">\n                        <iframe width="560" height="350" src="https://www.youtube.com/embed/9sEI1AUFJKw" frameborder="0" allowfullscreen=""></iframe>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </section>\n    <section id="about-endword">\n        <div class="container">\n            <div class="row">\n                <div class="col-md-12">\n                    <p>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>\n                </div>\n            </div>\n        </div>\n    </section>\n\n    <script>\n    var vid = document.getElementById("bgvid");\n    var pauseButton = document.querySelector("#about-header a");\n\n    function vidFade() {\n        vid.classList.add("stopfade");\n    }\n\n    vid.addEventListener(\'ended\', function() {\n        // only functional if "loop" is removed \n        vid.pause();\n        // to capture IE10\n        vidFade();\n    });\n\n\n    pauseButton.addEventListener("click", function() {\n        vid.classList.toggle("stopfade");\n        if (vid.paused) {\n            vid.play();\n            pauseButton.innerHTML = "";\n        } else {\n            vid.pause();\n            pauseButton.innerHTML = "";\n        }\n    })\n    $(document).ready(function() {\n        var icon = $(\'.play\');\n        icon.click(function() {\n            icon.toggleClass(\'active\');\n            return false;\n        });\n    });\n    </script>', 0, 'page', 1, '', '2016-10-03 15:44:48', '2016-10-24 16:21:35'),
(3, 'Kontakt', 'kontakt', '', '<!-- Start main-content -->\r\n        <div class="contact-header-title">\r\n            <p>Kontakt</p>\r\n        </div>\r\n        <div class="container contact-form-position">\r\n            <div class="row  ">\r\n                <div class="col-md-8 contact-form-padding">\r\n                    <div>\r\n                        <input class="form-control" type="text" value="Ime i prezime" id="example-text-input">\r\n                    </div>\r\n                    <div>\r\n                        <input class="form-control" type="email" value="Email" id="example-email-input">\r\n                    </div>\r\n                    <div>\r\n                        <input class="form-control" type="tel" value="Broj telefona" id="example-tel-input">\r\n                    </div>\r\n                    <div>\r\n                        <input class="form-control contact-form-comment-input" type="text" value="Komentar" id="example-text-input">\r\n                    </div>\r\n                </div>\r\n                <div class="col-md-4 contact-form-padding contact-padding-top">\r\n                    <div class="row contact-icon-top-margin ">\r\n                        <div class="col-md-3 col-xs-3 contact-icons-size"><i style="padding-top:25px;" class="fa fa-map-signs" aria-hidden="true"></i></div>\r\n                        <div class="col-md-9 col-xs-9">\r\n                            <div>\r\n                                <p class="contact-icon-text-size">Adresa</p>\r\n                                <p class="contact-icon-top-margin contact-icon-text-discription">OPG Stjepan Dumancic Tomin Put 1, Ceminac 31325</p>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                    <div class="row contact-icon-top-margin ">\r\n                        <div class="col-md-3 col-xs-3 contact-icons-size"><i style="padding-left:5px;" class="fa fa-phone" aria-hidden="true"></i></div>\r\n                        <div class="col-md-9 col-xs-9">\r\n                            <div>\r\n                                <p class="contact-icon-text-size">Mobitel</p>\r\n                                <p class="contact-icon-top-margin contact-icon-text-discription">+385 99 817 3880</p>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                    <div class="row contact-icon-top-margin ">\r\n                        <div class="col-md-3 col-xs-3 contact-icons-size"><i class="fa fa-envelope" aria-hidden="true"></i></div>\r\n                        <div class="col-md-9 col-xs-9">\r\n                            <div>\r\n                                <p class="contact-icon-text-size">E-mail</p>\r\n                                <p class="contact-icon-top-margin contact-icon-text-discription">info@stipino.com</p>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                    <div class="row contact-icon-top-margin ">\r\n                        <div class="col-md-3 col-xs-3 contact-icons-size"><i class="fa fa-skype" aria-hidden="true"></i></div>\r\n                        <div class="col-md-9 col-xs-9">\r\n                            <div>\r\n                                <p class="contact-icon-text-size">Skype</p>\r\n                                <p class="contact-icon-top-margin contact-icon-text-discription">stjepan.dumancic</p>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                    <div class="row contact-icon-top-margin ">\r\n                        <div class="col-md-3 col-xs-3 contact-icons-size"><i class="fa fa-facebook-official" aria-hidden="true"></i> </div>\r\n                        <div class="col-md-9 col-xs-9">\r\n                            <div>\r\n                                <p class="contact-icon-text-size">FB fan page</p>\r\n                                <p class="contact-icon-top-margin contact-icon-text-discription">www.facebook.com/stipinooo</p>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                    <div class="row contact-icon-top-margin ">\r\n                        <div class="col-md-3 col-xs-3 contact-icons-size"><i style="padding-left:5px;" class="fa fa-map-marker" aria-hidden="true"></i> </div>\r\n                        <div class="col-md-9 col-xs-9">\r\n                            <div>\r\n                                <p class="contact-icon-text-size">Lokacija(lon,lat)</p>\r\n                                <p class="contact-icon-top-margin contact-icon-text-discription">https://goo.gl/AcpqIL</p>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <div class="contact-button-div-margin">\r\n                <button class="contact-form-send-button">Pošalji!</button>\r\n            </div>\r\n        </div>\r\n        <div class="container">\r\n            <div id="map" class="contact-gm-size"></div>\r\n        </div>\r\n         <script>\r\n        (function(i, s, o, g, r, a, m) {\r\n            i[\'GoogleAnalyticsObject\'] = r;\r\n            i[r] = i[r] || function() {\r\n                (i[r].q = i[r].q || []).push(arguments)\r\n            }, i[r].l = 1 * new Date();\r\n            a = s.createElement(o),\r\n                m = s.getElementsByTagName(o)[0];\r\n            a.async = 1;\r\n            a.src = g;\r\n            m.parentNode.insertBefore(a, m)\r\n        })(window, document, \'script\', \'https://www.google-analytics.com/analytics.js\', \'ga\');\r\n\r\n        ga(\'create\', \'UA-2555128-15\', \'auto\');\r\n        ga(\'send\', \'pageview\');\r\n        </script>\r\n         \r\n        <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>\r\n    </div>\r\n    <script>\r\n    function initMap() {\r\n        var uluru = {\r\n            lat: 45.6699994,\r\n            lng: 18.6730698\r\n        };\r\n        var map = new google.maps.Map(document.getElementById(\'map\'), {\r\n            zoom: 16,\r\n            center: uluru\r\n        });\r\n        var marker = new google.maps.Marker({\r\n            position: uluru,\r\n            map: map\r\n        });\r\n    }\r\n    </script>\r\n    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1lTu-PZf-pmNGVuSvX4Dm7-svk6_MWOw&callback=initMap">\r\n    </script>', 0, 'page', 1, '', '2016-10-03 16:12:10', '2016-10-24 16:57:12'),
(4, 'ovo je drugi post', 'ovo-je-drugi-post', '<p>evo nekakav uvod tamo vamo     </p>', '<p>evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     evo nekakav uvod tamo vamo     <br></p>', 2, 'blog', 0, 'ovo-je-drugi-post-c81e7-2016-10-03.jpg', '2016-10-03 17:20:27', '2016-10-11 13:13:34'),
(5, 'Ovo je treća objava', 'ovo-je-treca-objava', '<p>Ha - Kha! AHBAN KRA DA!</p>', '<p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor faucibus malesuada. Mauris vel orci velit. Etiam pharetra ante ut odio sollicitudin, ornare accumsan elit ullamcorper. Donec porta pulvinar leo id cursus. Suspendisse fermentum elit et sem luctus, at aliquet magna hendrerit. Suspendisse potenti. Nam ut felis in magna euismod efficitur. Quisque at eros in nisl tempus dapibus. Aliquam ac interdum turpis, ut porttitor nisi. Pellentesque tristique odio turpis, eu scelerisque velit ullamcorper vitae. Suspendisse aliquet eleifend iaculis.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;">Quisque vehicula sit amet metus et malesuada. Integer vel dui at orci ornare pharetra ut vitae augue. Maecenas ultricies tellus at eros sollicitudin, et consectetur nisi sodales. In vestibulum dignissim pellentesque. Nulla facilisi. Integer egestas diam eleifend facilisis rutrum. Nulla dignissim faucibus ligula sit amet pulvinar. Aliquam erat volutpat. Cras aliquet lacinia erat a finibus.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;">Sed mollis gravida pellentesque. Praesent venenatis tincidunt lacus, eu varius massa semper at. In hac habitasse platea dictumst. Etiam egestas neque purus, id luctus massa finibus in. Nam mollis mollis enim id pellentesque. Donec sagittis arcu tortor, vel ornare nulla laoreet id. Etiam maximus elit vel ligula dictum, id egestas libero maximus. Duis imperdiet libero ex, vitae dictum ipsum laoreet sit amet.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;">Pellentesque interdum posuere quam at vulputate. Proin ac libero sapien. Aenean scelerisque pellentesque ex, viverra ultrices lectus pretium vel. Quisque risus leo, mattis sed ipsum efficitur, congue tempor sapien. Curabitur blandit nibh a facilisis feugiat. Sed interdum tincidunt imperdiet. Vivamus mattis arcu non ullamcorper dictum. Ut sed nulla consectetur lacus rutrum blandit. Etiam vestibulum massa risus, cursus ullamcorper mi accumsan ac. Nullam efficitur aliquam leo, ut aliquam mauris sagittis nec. Nunc id erat vel augue ultrices dapibus. Duis ut tortor dictum, euismod nisi sodales, ullamcorper urna. Vestibulum condimentum, ligula auctor viverra dictum, tellus nisi consequat lectus, id cursus tortor elit eu velit. Mauris rhoncus et magna sit amet vestibulum.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;">Sed et pharetra tellus, vitae ullamcorper justo. Proin augue augue, rutrum a ligula nec, mollis vehicula ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et sodales ligula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin sit amet libero sit amet enim maximus blandit. Proin a lacus arcu. Nulla fringilla eros at rutrum finibus. Donec sed cursus metus, convallis tempus dolor.</p>', 1, 'blog', 0, 'ovo-je-treca-objava-a87ff-2016-10-04.jpg', '2016-10-04 12:18:06', '2016-10-04 12:18:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
