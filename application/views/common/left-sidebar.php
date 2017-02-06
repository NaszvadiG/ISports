    <!-- left sidebar-->
    <nav id="left-sidebar">

        <div class="col-sm-3 col-md-2 sidebar left-sidebar">

            <div class="logo">
                <a>爱运动</a>
            </div>

            <div class="profile">
                <div class="profile-image center-block text-center">
                    <i class="sprite sprite-<?php echo $_SESSION['image'] ?>"></i>

                </div>
                <div class="profile-data text-center">
                    <div class="profile-data-name"><?php echo $_SESSION['username'] ?></div>
                    <div class="profile-data-info"><?php echo $_SESSION['nickname'] ?></div>

                </div>
            </div>


            <ul class="nav left-sidebar-items">
                <li id="button-sidebar-sport">
                    <a href="/sport">
                        <span class="glyphicon glyphicon-flag"></span>
                        <span class="left-sidebar-items-text">运动信息</span>
                    </a>
                </li>
                <li id="button-sidebar-activity">
                    <a href="/activity">
                        <span class="glyphicon glyphicon-tasks"></span>
                        <span class="left-sidebar-items-text">活动管理</span>
                    </a>
                </li>
                <li id="button-sidebar-relation">
                    <a href="/relation">
                        <span class="glyphicon glyphicon-link"></span>
                        <span class="left-sidebar-items-text">社交关系</span>
                    </a>
                </li>
                <li id="button-sidebar-blog">
                    <a href="/blog">
                        <span class="glyphicon glyphicon-globe"></span>
                        <span class="left-sidebar-items-text">运动博客</span>
                    </a>
                </li>
                <li id="button-sidebar-info">
                    <a href="/info">
                        <span class="glyphicon glyphicon-user"></span>
                        <span class="left-sidebar-items-text">个人资料</span>
                    </a>
                </li>
            </ul>
        </div>

    </nav>