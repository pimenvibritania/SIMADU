@extends('layouts.default')

@section('content')
<section id="content" class="container">
    <!-- Begin .page-heading -->
    <div class="page-heading">
        <div class="media clearfix">
            <div class="media-left pr30">
                <a href="#">
                    <img class="media-object mw150" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="...">
                </a>
            </div>
            <div class="media-body va-m">
                <h2 class="media-heading">Michael Halls
                    <small> - Profile</small>
                </h2>
                <p class="lead">Lorem ipsum dolor sit amet ctetur adicing elit, sed do eiusmod tempor incididunt</p>
                <div class="media-links">
                    <ul class="list-inline list-unstyled">
                        <li>
                            <a href="#" title="facebook link">
                                <span class="fa fa-facebook-square fs35 text-primary"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="twitter link">
                                <span class="fa fa-twitter-square fs35 text-info"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="google plus link">
                                <span class="fa fa-google-plus-square fs35 text-danger"></span>
                            </a>
                        </li>
                        <li class="hidden">
                            <a href="#" title="behance link">
                                <span class="fa fa-behance-square fs35 text-primary"></span>
                            </a>
                        </li>
                        <li class="hidden">
                            <a href="#" title="pinterest link">
                                <span class="fa fa-pinterest-square fs35 text-danger-light"></span>
                            </a>
                        </li>
                        <li class="hidden">
                            <a href="#" title="linkedin link">
                                <span class="fa fa-linkedin-square fs35 text-info"></span>
                            </a>
                        </li>
                        <li class="hidden">
                            <a href="#" title="github link">
                                <span class="fa fa-github-square fs35 text-dark"></span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#" title="phone link">
                                <span class="fa fa-phone-square fs35 text-system"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="email link">
                                <span class="fa fa-envelope-square fs35 text-muted"></span>
                            </a>
                        </li>
                        <li class="hidden">
                            <a href="#" title="external link">
                                <span class="fa fa-external-link-square fs35 text-muted"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
              <span class="panel-icon">
                <i class="fa fa-star"></i>
              </span>
                    <span class="panel-title"> User Popularity</span>
                </div>
                <div class="panel-body pn">
                    <table class="table mbn tc-icon-1 tc-med-2 tc-bold-last">
                        <thead>
                        <tr class="hidden">
                            <th class="mw30">#</th>
                            <th>First Name</th>
                            <th>Revenue</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <span class="fa fa-desktop text-warning"></span>
                            </td>
                            <td>Television</td>
                            <td>
                                <i class="fa fa-caret-up text-info pr10"></i>$855,913</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa fa-microphone text-primary"></span>
                            </td>
                            <td>Radio</td>
                            <td>
                                <i class="fa fa-caret-down text-danger pr10"></i>$349,712</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fa fa-newspaper-o text-info"></span>
                            </td>
                            <td>Newspaper</td>
                            <td>
                                <i class="fa fa-caret-up text-info pr10"></i>$1,259,742</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading">
              <span class="panel-icon">
                <i class="fa fa-trophy"></i>
              </span>
                    <span class="panel-title"> My Skills</span>
                </div>
                <div class="panel-body pb5">
                    <span class="label label-warning mr5 mb10 ib lh15">Default</span>
                    <span class="label label-primary mr5 mb10 ib lh15">Primary</span>
                    <span class="label label-info mr5 mb10 ib lh15">Success</span>
                    <span class="label label-success mr5 mb10 ib lh15">Info</span>
                    <span class="label label-alert mr5 mb10 ib lh15">Warning</span>
                    <span class="label label-system mr5 mb10 ib lh15">Danger</span>
                    <span class="label label-info mr5 mb10 ib lh15">Success</span>
                    <span class="label label-success mr5 mb10 ib lh15">Ui Design</span>
                    <span class="label label-primary mr5 mb10 ib lh15">Primary</span>

                </div>
            </div>
            <div class="panel">
                <div class="panel-heading">
              <span class="panel-icon">
                <i class="fa fa-pencil"></i>
              </span>
                    <span class="panel-title">About Me</span>
                </div>
                <div class="panel-body pb5">

                    <h6>Experience</h6>

                    <h4>Facebook Internship</h4>
                    <p class="text-muted"> University of Missouri, Columbia
                        <br> Student Health Center, June 2010 - 2012
                    </p>

                    <hr class="short br-lighter">

                    <h6>Education</h6>

                    <h4>Bachelor of Science, PhD</h4>
                    <p class="text-muted"> University of Missouri, Columbia
                        <br> Student Health Center, June 2010 through Aug 2011
                    </p>

                    <hr class="short br-lighter">

                    <h6>Accomplishments</h6>

                    <h4>Successful Business</h4>
                    <p class="text-muted pb10"> University of Missouri, Columbia
                        <br> Student Health Center, June 2010 through Aug 2011
                    </p>

                </div>
            </div>
        </div>
        <div class="col-md-8">

            <div class="tab-block">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab">Activity</a>
                    </li>
                    <li>
                        <a href="#tab1" data-toggle="tab">Social</a>
                    </li>
                    <li>
                        <a href="#tab1" data-toggle="tab">Media</a>
                    </li>
                </ul>
                <div class="tab-content p30" style="height: 730px;">
                    <div id="tab1" class="tab-pane active">
                        <div class="media">
                            <a class="pull-left" href="#"> <img class="media-object mn thumbnail mw50" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="..."> </a>
                            <div class="media-body">
                                <h5 class="media-heading mb20">Simon Rivers Posted
                                    <small> - 3 hours ago</small>
                                </h5>
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="mw140 mr25 mb20">
                                <img src="https://bootdey.com/img/Content/avatar/avatar8.png" class="mw140 mr25 mb20">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="mw140 mb20">
                                <div class="media-links">
                      <span class="text-light fs12 mr10">
                        <span class="fa fa-thumbs-o-up text-primary mr5"></span> Like </span>
                                    <span class="text-light fs12 mr10">
                        <span class="fa fa-share text-primary mr5"></span> Share </span>
                                    <span class="text-light fs12 mr10">
                        <span class="fa fa-floppy-o text-primary mr5"></span> Save </span>
                                    <span class="text-light fs12 mr10">
                        <span class="fa fa-comment text-primary mr5"></span> Comment </span>
                                </div>
                            </div>
                        </div>
                        <div class="media mt25">
                            <a class="pull-left" href="#"> <img class="media-object mn thumbnail thumbnail-sm rounded mw40" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="..."> </a>
                            <div class="media-body mb5">
                                <h5 class="media-heading mbn">Simon Rivers Posted
                                    <small> - 3 hours ago</small>
                                </h5>
                                <p> Omg so freaking sweet dude.</p>
                                <div class="media pb10">
                                    <a class="pull-left" href="#"> <img class="media-object mn thumbnail thumbnail-sm rounded mw40" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="..."> </a>
                                    <div class="media-body mb5">
                                        <h5 class="media-heading mbn">Jessica Wong
                                            <small> - 3 hours ago</small>
                                        </h5>
                                        <p>Omgosh I'm in love</p>
                                    </div>
                                </div>
                                <div class="media mtn">
                                    <a class="pull-left" href="#"> <img class="media-object mn thumbnail thumbnail-sm rounded mw40" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="..."> </a>
                                    <div class="media-body mb5">
                                        <h5 class="media-heading mbn">Jessica Wong
                                            <small> - 3 hours ago</small>
                                        </h5>
                                        <p>Omgosh I'm in love</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="media mt25">
                            <a class="pull-left" href="#"> <img class="media-object thumbnail mw50" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="..."> </a>
                            <div class="media-body">
                                <h5 class="media-heading mb20">Simon Rivers Posted
                                    <small> - 3 hours ago</small>
                                </h5>
                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="mw140 mr25 mb20">
                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="mw140 mr25 mb20">
                                <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="mw140 mb20">
                                <div class="media-links">
                      <span class="text-light fs12 mr10">
                        <span class="fa fa-thumbs-o-up text-primary mr5"></span> Like </span>
                                    <span class="text-light fs12 mr10">
                        <span class="fa fa-share text-primary mr5"></span> Share </span>
                                    <span class="text-light fs12 mr10">
                        <span class="fa fa-floppy-o text-primary mr5"></span> Save </span>
                                    <span class="text-light fs12 mr10">
                        <span class="fa fa-comment text-primary mr5"></span> Comment </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" class="tab-pane"></div>
                    <div id="tab3" class="tab-pane"></div>
                    <div id="tab4" class="tab-pane"></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
