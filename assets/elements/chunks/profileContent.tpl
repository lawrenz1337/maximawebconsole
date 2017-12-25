<style type="text/css">
    /***
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/

    body {
        background: #F1F3FA;
    }

    /* Profile container */
    .profile {
        margin: 20px 0;
    }

    /* Profile sidebar */
    .profile-sidebar {
        padding: 20px 0 0 0;
        background: #fff;
    }

    .profile-usertitle {
        text-align: center;
        margin-top: 20px;
    }

    .profile-usertitle-name {
        color: #5a7391;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .profile-usertitle-job {
        text-transform: uppercase;
        color: #5b9bd1;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .profile-userbuttons {
        text-align: center;
        margin-top: 10px;
    }

    .profile-userbuttons .btn {
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 15px;
        margin-right: 5px;
    }

    .profile-userbuttons .btn:last-child {
        margin-right: 0px;
    }

    .profile-usermenu {
        margin-top: 30px;
    }


    /* Profile Content */
    .profile-content {
        padding: 20px;
        background: #fff;
        min-height: 460px;
    }
    #request {
        text-overflow: clip
    }
    th {
        text-align: center;
    }
</style>

<div class="container-fluid main-wrapper">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USER TITLE -->
                [[!Profile]]
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        [[+username]]
                    </div>
                    <div class="profile-usertitle-job">
                        [[+email]]
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">


                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            My Commands
                            <span class="badge badge-primary badge-pill">[[!commands]]</span>
                        </li>
                        <!--li class="list-group-item d-flex justify-content-between align-items-center">
                            Profile
                        </li-->
                    </ul>


                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th>Input</th>
                        <th>Output</th>
                        <th>Images</th>
                    </tr>
                    </thead>
                    <tbody id="request">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>