<?php
/**
 * Created by PhpStorm.
 * User: lincoln
 * Date: 12/9/19
 * Time: 10:24 AM
 */
$db=new \omh\database\DB();
$mails=$db->getUserInbox('mugalink2@gmail.com');
var_dump($mails);
?>
<div class="row">
<div class="sidebar-content col-lg-3">

    <!-- Actions -->
    <div class="card">
        <div class="card-header bg-transparent header-elements-inline">
            <span class="text-uppercase font-size-sm font-weight-semibold">Actions</span>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item rotate-180" data-action="collapse"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <a href="#" class="btn bg-indigo-400 btn-block">Compose mail</a>
        </div>
    </div>
    <!-- /actions -->


    <!-- Sub navigation -->
    <div class="card">
        <div class="card-header bg-transparent header-elements-inline">
            <span class="text-uppercase font-size-sm font-weight-semibold">Navigation</span>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <li class="nav-item-header">Folders</li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="icon-drawer-in"></i>
                        Inbox
                        <span class="badge bg-success badge-pill ml-auto">32</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="icon-drawer3"></i> Drafts</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="icon-drawer-out"></i> Sent mail</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="icon-stars"></i> Starred</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="icon-spam"></i>
                        Spam
                        <span class="badge bg-danger badge-pill ml-auto">99+</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="icon-bin"></i> Trash</a>
                </li>
                <li class="nav-item-header">Labels</li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><span class="badge badge-mark border-primary align-self-center mr-3"></span> Facebook</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><span class="badge badge-mark border-success align-self-center mr-3"></span> Spotify</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><span class="badge badge-mark border-indigo-400 align-self-center mr-3"></span> Twitter</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><span class="badge badge-mark border-pink-400 align-self-center mr-3"></span> Dribbble</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /sub navigation -->


    <!-- Contacts -->
    <div class="card">
        <div class="card-header bg-transparent header-elements-inline">
            <span class="text-uppercase font-size-sm font-weight-semibold">Contacts</span>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <ul class="media-list">
                <li class="media">
                    <a href="#" class="mr-3 position-relative">
                        <img src="../../../../global_assets/images/demo/users/face11.jpg" width="36" height="36" class="rounded-circle" alt="">
                        <span class="badge badge-info badge-pill badge-float border-2 border-white">6</span>
                    </a>

                    <div class="media-body">
                        <div class="font-weight-semibold">Rebecca Jameson</div>
                        <span class="font-size-sm text-muted">Web developer</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <div class="dropdown">
                            <a href="#" class="text-default dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-164px, 17px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
                                <a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
                                <a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="media">
                    <a href="#" class="mr-3 position-relative">
                        <img src="../../../../global_assets/images/demo/users/face25.jpg" width="36" height="36" class="rounded-circle" alt="">
                        <span class="badge badge-info badge-pill badge-float border-2 border-white">9</span>
                    </a>

                    <div class="media-body">
                        <div class="font-weight-semibold">Walter Sommers</div>
                        <span class="font-size-sm text-muted">Lead developer</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <div class="dropdown">
                            <a href="#" class="text-default dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-more2"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
                                <a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
                                <a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="media">
                    <a href="#" class="mr-3">
                        <img src="../../../../global_assets/images/demo/users/face10.jpg" width="36" height="36" class="rounded-circle" alt="">
                    </a>

                    <div class="media-body">
                        <div class="font-weight-semibold">Otto Gerwald</div>
                        <span class="font-size-sm text-muted">Front end developer</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <div class="dropdown">
                            <a href="#" class="text-default dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-more2"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
                                <a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
                                <a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="media">
                    <a href="#" class="mr-3">
                        <img src="../../../../global_assets/images/demo/users/face14.jpg" width="36" height="36" class="rounded-circle" alt="">
                    </a>

                    <div class="media-body">
                        <div class="font-weight-semibold">Vince Satmann</div>
                        <span class="font-size-sm text-muted">UX expert</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <div class="dropdown">
                            <a href="#" class="text-default dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-more2"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
                                <a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
                                <a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="media">
                    <a href="#" class="mr-3">
                        <img src="../../../../global_assets/images/demo/users/face24.jpg" width="36" height="36" class="rounded-circle" alt="">
                    </a>

                    <div class="media-body">
                        <div class="font-weight-semibold">Jason Leroy</div>
                        <span class="font-size-sm text-muted">SEO specialist</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <div class="dropdown">
                            <a href="#" class="text-default dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-more2"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
                                <a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
                                <a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- /contacts -->

</div>
    <!-- Multiple lines -->
    <div class="card col-lg-9">
        <div class="card-header bg-transparent header-elements-inline">
            <h6 class="card-title">My Inbox</h6>

            <div class="header-elements">
                <span class="badge bg-blue">259 new today</span>
            </div>
        </div>

        <!-- Action toolbar -->
        <div class="bg-light">
            <div class="navbar navbar-light bg-light navbar-expand-lg py-lg-2">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="navbar-toggler w-100" data-toggle="collapse" data-target="#inbox-toolbar-toggle-single">
                        <i class="icon-circle-down2"></i>
                    </button>
                </div>

                <div class="navbar-collapse text-center text-lg-left flex-wrap collapse" id="inbox-toolbar-toggle-single">
                    <div class="mt-3 mt-lg-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light btn-icon btn-checkbox-all">
                                <input type="checkbox" class="form-input-styled" data-fouc>
                            </button>

                            <button type="button" class="btn btn-light btn-icon dropdown-toggle" data-toggle="dropdown"></button>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Select all</a>
                                <a href="#" class="dropdown-item">Select read</a>
                                <a href="#" class="dropdown-item">Select unread</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">Clear selection</a>
                            </div>
                        </div>

                        <div class="btn-group ml-3 mr-lg-3">
                            <button type="button" class="btn btn-light"><i class="icon-pencil7"></i> <span class="d-none d-lg-inline-block ml-2">Compose</span></button>
                            <button type="button" class="btn btn-light"><i class="icon-bin"></i> <span class="d-none d-lg-inline-block ml-2">Delete</span></button>
                            <button type="button" class="btn btn-light"><i class="icon-spam"></i> <span class="d-none d-lg-inline-block ml-2">Spam</span></button>
                        </div>
                    </div>

                    <div class="navbar-text ml-lg-auto"><span class="font-weight-semibold">1-50</span> of <span class="font-weight-semibold">528</span></div>

                    <div class="ml-lg-3 mb-3 mb-lg-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light btn-icon disabled"><i class="icon-arrow-left12"></i></button>
                            <button type="button" class="btn btn-light btn-icon"><i class="icon-arrow-right13"></i></button>
                        </div>

                        <div class="btn-group ml-3">
                            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Action</a>
                                <a href="#" class="dropdown-item">Another action</a>
                                <a href="#" class="dropdown-item">Something else here</a>
                                <a href="#" class="dropdown-item">One more line</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /action toolbar -->


        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-inbox">
                <tbody data-link="row" class="rowlink">
                <tr class="unread">
                    <td class="table-inbox-checkbox rowlink-skip">
                        <input type="checkbox" class="form-input-styled" data-fouc>
                    </td>
                    <td class="table-inbox-star rowlink-skip">
                        <a href="#">
                            <i class="icon-star-empty3 text-muted"></i>
                        </a>
                    </td>
                    <td class="table-inbox-image">
                        <img src="../../../../global_assets/images/brands/spotify.png" class="rounded-circle" width="32" height="32" alt="">
                    </td>
                    <td class="table-inbox-name">
                        <a href="mail_read.html">
                            <div class="letter-icon-title text-default">Spotify</div>
                        </a>
                    </td>
                    <td class="table-inbox-message">
                        <div class="table-inbox-subject">On Tower-hill, as you go down &nbsp;-&nbsp;</div>
                        <span class="text-muted font-weight-normal">To the London docks, you may have seen a crippled beggar (or KEDGER, as the sailors say) holding a painted board before him, representing the tragic scene in which he lost his leg</span>
                    </td>
                    <td class="table-inbox-attachment">
                        <i class="icon-attachment text-muted"></i>
                    </td>
                    <td class="table-inbox-time">
                        11:09 pm
                    </td>
                </tr>

                <tr class="unread">
                    <td class="table-inbox-checkbox rowlink-skip">
                        <input type="checkbox" class="form-input-styled" data-fouc>
                    </td>
                    <td class="table-inbox-star rowlink-skip">
                        <a href="#">
                            <i class="icon-star-empty3 text-muted"></i>
                        </a>
                    </td>
                    <td class="table-inbox-image">
										<span class="btn bg-warning-400 rounded-circle btn-icon btn-sm">
											<span class="letter-icon"></span>
										</span>
                    </td>
                    <td class="table-inbox-name">
                        <a href="mail_read.html">
                            <div class="letter-icon-title text-default">James Alexander</div>
                        </a>
                    </td>
                    <td class="table-inbox-message">
                        <div class="table-inbox-subject"><span class="badge bg-success mr-2">Promo</span> There are three whales and three boats &nbsp;-&nbsp;</div>
                        <span class="text-muted font-weight-normal">And one of the boats (presumed to contain the missing leg in all its original integrity) is being crunched by the jaws of the foremost whale</span>
                    </td>
                    <td class="table-inbox-attachment">
                        <i class="icon-attachment text-muted"></i>
                    </td>
                    <td class="table-inbox-time">
                        10:21 pm
                    </td>
                </tr>

                <tr class="unread">
                    <td class="table-inbox-checkbox rowlink-skip">
                        <input type="checkbox" class="form-input-styled" data-fouc>
                    </td>
                    <td class="table-inbox-star rowlink-skip">
                        <a href="#">
                            <i class="icon-star-full2 text-warning-300"></i>
                        </a>
                    </td>
                    <td class="table-inbox-image">
                        <img src="../../../../global_assets/images/demo/users/face2.jpg" class="rounded-circle" width="32" height="32" alt="">
                    </td>
                    <td class="table-inbox-name">
                        <a href="mail_read.html">
                            <div class="letter-icon-title text-default">Nathan Jacobson</div>
                        </a>
                    </td>
                    <td class="table-inbox-message">
                        <div class="table-inbox-subject">Any time these ten years, they tell me, has that man held up &nbsp;-&nbsp;</div>
                        <span class="text-muted font-weight-normal">That picture, and exhibited that stump to an incredulous world. But the time of his justification has now come. His three whales are as good whales as were ever published in Wapping, at any rate; and his stump</span>
                    </td>
                    <td class="table-inbox-attachment"></td>
                    <td class="table-inbox-time">
                        8:37 pm
                    </td>
                </tr>

                <tr>
                    <td class="table-inbox-checkbox rowlink-skip">
                        <input type="checkbox" class="form-input-styled" data-fouc>
                    </td>
                    <td class="table-inbox-star rowlink-skip">
                        <a href="#">
                            <i class="icon-star-full2 text-warning-300"></i>
                        </a>
                    </td>
                    <td class="table-inbox-image">
										<span class="btn bg-indigo-400 rounded-circle btn-icon btn-sm">
											<span class="letter-icon"></span>
										</span>
                    </td>
                    <td class="table-inbox-name">
                        <a href="mail_read.html">
                            <div class="letter-icon-title text-default">Margo Baker</div>
                        </a>
                    </td>
                    <td class="table-inbox-message">
                        <div class="table-inbox-subject">Throughout the Pacific, and also in Nantucket, and New Bedford &nbsp;-&nbsp;</div>
                        <span class="text-muted font-weight-normal">and Sag Harbor, you will come across lively sketches of whales and whaling-scenes, graven by the fishermen themselves on Sperm Whale-teeth, or ladies' busks wrought out of the Right Whale-bone</span>
                    </td>
                    <td class="table-inbox-attachment"></td>
                    <td class="table-inbox-time">
                        4:28 am
                    </td>
                </tr>

                <tr>
                    <td class="table-inbox-checkbox rowlink-skip">
                        <input type="checkbox" class="form-input-styled" data-fouc>
                    </td>
                    <td class="table-inbox-star rowlink-skip">
                        <a href="#">
                            <i class="icon-star-empty3 text-muted"></i>
                        </a>
                    </td>
                    <td class="table-inbox-image">
                        <img src="../../../../global_assets/images/brands/dribbble.png" class="rounded-circle" width="32" height="32" alt="">
                    </td>
                    <td class="table-inbox-name">
                        <a href="mail_read.html">
                            <div class="letter-icon-title text-default">Dribbble</div>
                        </a>
                    </td>
                    <td class="table-inbox-message">
                        <div class="table-inbox-subject">The whalemen call the numerous little ingenious contrivances &nbsp;-&nbsp;</div>
                        <span class="text-muted font-weight-normal">They elaborately carve out of the rough material, in their hours of ocean leisure. Some of them have little boxes of dentistical-looking implements</span>
                    </td>
                    <td class="table-inbox-attachment"></td>
                    <td class="table-inbox-time">
                        Dec 5
                    </td>
                </tr>

                <tr>
                    <td class="table-inbox-checkbox rowlink-skip">
                        <input type="checkbox" class="form-input-styled" data-fouc>
                    </td>
                    <td class="table-inbox-star rowlink-skip">
                        <a href="#">
                            <i class="icon-star-empty3 text-muted"></i>
                        </a>
                    </td>
                    <td class="table-inbox-image">
										<span class="btn bg-brown-400 rounded-circle btn-icon btn-sm">
											<span class="letter-icon"></span>
										</span>
                    </td>
                    <td class="table-inbox-name">
                        <a href="mail_read.html">
                            <div class="letter-icon-title text-default">Hanna Dorman</div>
                        </a>
                    </td>
                    <td class="table-inbox-message">
                        <div class="table-inbox-subject">Some of them have little boxes of dentistical-looking implements &nbsp;-&nbsp;</div>
                        <span class="text-muted font-weight-normal">Specially intended for the skrimshandering business. But, in general, they toil with their jack-knives alone; and, with that almost omnipotent tool of the sailor</span>
                    </td>
                    <td class="table-inbox-attachment">
                        <i class="icon-attachment text-muted"></i>
                    </td>
                    <td class="table-inbox-time">
                        Dec 5
                    </td>
                </tr>

                <tr>
                    <td class="table-inbox-checkbox rowlink-skip">
                        <input type="checkbox" class="form-input-styled" data-fouc>
                    </td>
                    <td class="table-inbox-star rowlink-skip">
                        <a href="#">
                            <i class="icon-star-empty3 text-muted"></i>
                        </a>
                    </td>
                    <td class="table-inbox-image">
                        <img src="../../../../global_assets/images/brands/twitter.png" class="rounded-circle" width="32" height="32" alt="">
                    </td>
                    <td class="table-inbox-name">
                        <a href="mail_read.html">
                            <div class="letter-icon-title text-default">Twitter</div>
                        </a>
                    </td>
                    <td class="table-inbox-message">
                        <div class="table-inbox-subject"><span class="badge bg-indigo-400 mr-2">Order</span> Long exile from Christendom &nbsp;-&nbsp;</div>
                        <span class="text-muted font-weight-normal">And civilization inevitably restores a man to that condition in which God placed him, i.e. what is called savagery</span>
                    </td>
                    <td class="table-inbox-attachment"></td>
                    <td class="table-inbox-time">
                        Dec 4
                    </td>
                </tr>

                <tr>
                    <td class="table-inbox-checkbox rowlink-skip">
                        <input type="checkbox" class="form-input-styled" data-fouc>
                    </td>
                    <td class="table-inbox-star rowlink-skip">
                        <a href="#">
                            <i class="icon-star-full2 text-warning-300"></i>
                        </a>
                    </td>
                    <td class="table-inbox-image">
										<span class="btn bg-pink-400 rounded-circle btn-icon btn-sm">
											<span class="letter-icon"></span>
										</span>
                    </td>
                    <td class="table-inbox-name">
                        <a href="mail_read.html">
                            <div class="letter-icon-title text-default">Vanessa Aurelius</div>
                        </a>
                    </td>
                    <td class="table-inbox-message">
                        <div class="table-inbox-subject">Your true whale-hunter is as much a savage as an Iroquois &nbsp;-&nbsp;</div>
                        <span class="text-muted font-weight-normal">I myself am a savage, owning no allegiance but to the King of the Cannibals; and ready at any moment to rebel against him. Now, one of the peculiar characteristics of the savage in his domestic hours</span>
                    </td>
                    <td class="table-inbox-attachment">
                        <i class="icon-attachment text-muted"></i>
                    </td>
                    <td class="table-inbox-time">
                        Dec 4
                    </td>
                </tr>

                <tr>
                    <td class="table-inbox-checkbox rowlink-skip">
                        <input type="checkbox" class="form-input-styled" data-fouc>
                    </td>
                    <td class="table-inbox-star rowlink-skip">
                        <a href="#">
                            <i class="icon-star-empty3 text-muted"></i>
                        </a>
                    </td>
                    <td class="table-inbox-image">
                        <img src="../../../../global_assets/images/demo/users/face8.jpg" class="rounded-circle" width="32" height="32" alt="">
                    </td>
                    <td class="table-inbox-name">
                        <a href="mail_read.html">
                            <div class="letter-icon-title text-default">William Brenson</div>
                        </a>
                    </td>
                    <td class="table-inbox-message">
                        <div class="table-inbox-subject">An ancient Hawaiian war-club or spear-paddle &nbsp;-&nbsp;</div>
                        <span class="text-muted font-weight-normal">In its full multiplicity and elaboration of carving, is as great a trophy of human perseverance as a Latin lexicon. For, with but a bit of broken sea-shell or a shark's tooth</span>
                    </td>
                    <td class="table-inbox-attachment">
                        <i class="icon-attachment text-muted"></i>
                    </td>
                    <td class="table-inbox-time">
                        Dec 4
                    </td>
                </tr>

                <tr>
                    <td class="table-inbox-checkbox rowlink-skip">
                        <input type="checkbox" class="form-input-styled" data-fouc>
                    </td>
                    <td class="table-inbox-star rowlink-skip">
                        <a href="#">
                            <i class="icon-star-empty3 text-muted"></i>
                        </a>
                    </td>
                    <td class="table-inbox-image">
                        <img src="../../../../global_assets/images/brands/facebook.png" class="rounded-circle" width="32" height="32" alt="">
                    </td>
                    <td class="table-inbox-name">
                        <a href="mail_read.html">
                            <div class="letter-icon-title text-default">Facebook</div>
                        </a>
                    </td>
                    <td class="table-inbox-message">
                        <div class="table-inbox-subject">As with the Hawaiian savage, so with the white sailor-savage &nbsp;-&nbsp;</div>
                        <span class="text-muted font-weight-normal">With the same marvellous patience, and with the same single shark's tooth, of his one poor jack-knife, he will carve you a bit of bone sculpture, not quite as workmanlike</span>
                    </td>
                    <td class="table-inbox-attachment"></td>
                    <td class="table-inbox-time">
                        Dec 3
                    </td>
                </tr>

                <tr>
                    <td class="table-inbox-checkbox rowlink-skip">
                        <input type="checkbox" class="form-input-styled" data-fouc>
                    </td>
                    <td class="table-inbox-star rowlink-skip">
                        <a href="#">
                            <i class="icon-star-full2 text-warning-300"></i>
                        </a>
                    </td>
                    <td class="table-inbox-image">
                        <img src="../../../../global_assets/images/demo/users/face16.jpg" class="rounded-circle" width="32" height="32" alt="">
                    </td>
                    <td class="table-inbox-name">
                        <a href="mail_read.html">
                            <div class="letter-icon-title text-default">Vicky Barna</div>
                        </a>
                    </td>
                    <td class="table-inbox-message">
                        <div class="table-inbox-subject"><span class="badge bg-pink-400 mr-2">Track</span> Achilles's shield &nbsp;-&nbsp;</div>
                        <span class="text-muted font-weight-normal">Wooden whales, or whales cut in profile out of the small dark slabs of the noble South Sea war-wood, are frequently met with in the forecastles of American whalers. Some of them are done with much accuracy</span>
                    </td>
                    <td class="table-inbox-attachment"></td>
                    <td class="table-inbox-time">
                        Dec 2
                    </td>
                </tr>

                <tr>
                    <td class="table-inbox-checkbox rowlink-skip">
                        <input type="checkbox" class="form-input-styled" data-fouc>
                    </td>
                    <td class="table-inbox-star rowlink-skip">
                        <a href="#">
                            <i class="icon-star-empty3 text-muted"></i>
                        </a>
                    </td>
                    <td class="table-inbox-image">
                        <img src="../../../../global_assets/images/brands/youtube.png" class="rounded-circle" width="32" height="32" alt="">
                    </td>
                    <td class="table-inbox-name">
                        <a href="mail_read.html">
                            <div class="letter-icon-title text-default">Youtube</div>
                        </a>
                    </td>
                    <td class="table-inbox-message">
                        <div class="table-inbox-subject">At some old gable-roofed country houses &nbsp;-&nbsp;</div>
                        <span class="text-muted font-weight-normal">You will see brass whales hung by the tail for knockers to the road-side door. When the porter is sleepy, the anvil-headed whale would be best. But these knocking whales are seldom remarkable as faithful essays</span>
                    </td>
                    <td class="table-inbox-attachment">
                        <i class="icon-attachment text-muted"></i>
                    </td>
                    <td class="table-inbox-time">
                        Nov 30
                    </td>
                </tr>

                <tr>
                    <td class="table-inbox-checkbox rowlink-skip">
                        <input type="checkbox" class="form-input-styled" data-fouc>
                    </td>
                    <td class="table-inbox-star rowlink-skip">
                        <a href="#">
                            <i class="icon-star-empty3 text-muted"></i>
                        </a>
                    </td>
                    <td class="table-inbox-image">
                        <img src="../../../../global_assets/images/demo/users/face24.jpg" class="rounded-circle" width="32" height="32" alt="">
                    </td>
                    <td class="table-inbox-name">
                        <a href="mail_read.html">
                            <div class="letter-icon-title text-default">Tony Gurrano</div>
                        </a>
                    </td>
                    <td class="table-inbox-message">
                        <div class="table-inbox-subject">On the spires of some old-fashioned churches &nbsp;-&nbsp;</div>
                        <span class="text-muted font-weight-normal">You will see sheet-iron whales placed there for weather-cocks; but they are so elevated, and besides that are to all intents and purposes so labelled with "HANDS OFF!" you cannot examine them</span>
                    </td>
                    <td class="table-inbox-attachment"></td>
                    <td class="table-inbox-time">
                        Nov 28
                    </td>
                </tr>

                <tr>
                    <td class="table-inbox-checkbox rowlink-skip">
                        <input type="checkbox" class="form-input-styled" data-fouc>
                    </td>
                    <td class="table-inbox-star rowlink-skip">
                        <a href="#">
                            <i class="icon-star-empty3 text-muted"></i>
                        </a>
                    </td>
                    <td class="table-inbox-image">
										<span class="btn bg-danger-400 rounded-circle btn-icon btn-sm">
											<span class="letter-icon"></span>
										</span>
                    </td>
                    <td class="table-inbox-name">
                        <a href="mail_read.html">
                            <div class="letter-icon-title text-default">Barbara Walden</div>
                        </a>
                    </td>
                    <td class="table-inbox-message">
                        <div class="table-inbox-subject">In bony, ribby regions of the earth &nbsp;-&nbsp;</div>
                        <span class="text-muted font-weight-normal">Where at the base of high broken cliffs masses of rock lie strewn in fantastic groupings upon the plain, you will often discover images as of the petrified forms</span>
                    </td>
                    <td class="table-inbox-attachment"></td>
                    <td class="table-inbox-time">
                        Nov 28
                    </td>
                </tr>

                <tr>
                    <td class="table-inbox-checkbox rowlink-skip">
                        <input type="checkbox" class="form-input-styled" data-fouc>
                    </td>
                    <td class="table-inbox-star rowlink-skip">
                        <a href="#">
                            <i class="icon-star-full2 text-warning-300"></i>
                        </a>
                    </td>
                    <td class="table-inbox-image">
                        <img src="../../../../global_assets/images/brands/amazon.png" class="rounded-circle" width="32" height="32" alt="">
                    </td>
                    <td class="table-inbox-name">
                        <a href="mail_read.html">
                            <div class="letter-icon-title text-default">Amazon</div>
                        </a>
                    </td>
                    <td class="table-inbox-message">
                        <div class="table-inbox-subject">Here and there from some lucky point of view &nbsp;-&nbsp;</div>
                        <span class="text-muted font-weight-normal">You will catch passing glimpses of the profiles of whales defined along the undulating ridges. But you must be a thorough whaleman, to see these sights; and not only that, but if you wish to return to such a sight again</span>
                    </td>
                    <td class="table-inbox-attachment">
                        <i class="icon-attachment text-muted"></i>
                    </td>
                    <td class="table-inbox-time">
                        Nov 27
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /table -->

    </div>
    <!-- /multiple lines -->

</div>

<script>
    // Setup module
    // ------------------------------

    var MailList = function() {


        //
        // Setup module components
        //

        // Inbox table
        var _componentTableInbox = function() {

            // Define variables
            var highlightColorClass = 'alpha-slate';

            // Highlight row when checkbox is checked
            $('.table-inbox').find('tr > td:first-child').find('input[type=checkbox]').on('change', function() {
                if($(this).is(':checked')) {
                    $(this).parents('tr').addClass(highlightColorClass);
                }
                else {
                    $(this).parents('tr').removeClass(highlightColorClass);
                }
            });

            // Grab first letter and insert to the icon
            $('.table-inbox tr').each(function (i) {

                // Title
                var $title = $(this).find('.letter-icon-title'),
                    letter = $title.eq(0).text().charAt(0).toUpperCase();

                // Icon
                var $icon = $(this).find('.letter-icon');
                $icon.eq(0).text(letter);
            });
        };

        // Row link
        var _componentRowLink = function() {
            if (!$().rowlink) {
                console.warn('Warning - rowlink.js is not loaded.');
                return;
            }

            // Initialize
            $('tbody.rowlink').rowlink({
                target: '.table-inbox-name > a'
            });
        };

        // Uniform
        var _componentUniform = function() {
            if (!$().uniform) {
                console.warn('Warning - uniform.min.js is not loaded.');
                return;
            }

            // Initialize
            $('.form-input-styled').uniform();
        };


        //
        // Return objects assigned to module
        //

        return {
            init: function() {
                _componentTableInbox();
                _componentRowLink();
                _componentUniform();
            }
        }
    }();


    // Initialize module
    // ------------------------------

    document.addEventListener('DOMContentLoaded', function() {
        MailList.init();
    });
</script>