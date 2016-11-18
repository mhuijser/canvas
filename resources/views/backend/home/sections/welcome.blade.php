<div class="card">
    <div class="card-header">
        @if($data['canvasVersion'] !== $data['latestRelease'])
            <div class="alert alert-info">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color: white">&times;</a>
                <a href="{{ url('http://github.com/austintoddj/canvas/releases/tag/') . $data['latestRelease'] }}" target="_blank" style="color: white"><strong>Canvas {{ $data['latestRelease'] }}</strong></a> is available! <a href="http://github.com/austintoddj/canvas/blob/master/UPGRADE.md" target="_blank" style="color: white"><strong>Please update now.</strong></a>
            </div>
        @endif

        <h2>Welcome to Canvas!
            <small>Here are some helpful links we've gathered to get you started:
            </small>
        </h2>
    </div>
    <div class="card-body card-padding">
        <div class="row">
            <div class="col-sm-4">
                <h5>Getting Started</h5>
                <br>
                <a href="https://github.com/austintoddj/canvas#advanced-options" target="_blank" class="btn btn-primary btn-icon-text"><i class="zmdi zmdi-invert-colors"></i> Create a Theme</a>
                <br>
                <br>
                <a href="{{ url('admin/profile') }}" class="btn btn-primary btn-icon-text"><i class="zmdi zmdi-account"></i> Update your Profile</a>
                <br>
                <br>
            </div>
            <div class="col-sm-4">
                <h5>Next Steps</h5>
                <ul class="getting-started">
                    <li><i class="zmdi zmdi-comment-edit"></i> <a href="{{ url('admin/post/create') }}">Write your first blog post</a></li>
                    <li><i class="zmdi zmdi-plus-circle"></i> <a href="{{ url('admin/tag/create') }}">Create a new tag</a></li>
                    <li><i class="zmdi zmdi-view-web"></i> <a href="{{ url('/') }}" target="_blank">View your site</a></li>
                </ul>
                <br>
            </div>
            <div class="col-sm-4">
                <h5>More Actions</h5>
                <ul class="getting-started">
                    <li><i class="zmdi zmdi-disqus"></i> <a href="{{ url('admin/settings') }}">Disqus Integration</a></li>
                    <li><i class="zmdi zmdi-trending-up"></i> <a href="{{ url('admin/settings') }}">Google Analytics Setup</a></li>
                    <li><i class="zmdi zmdi-wrench"></i> <a href="{{ url('admin/tools') }}">Advanced Tools</a></li></a></li>
                </ul>
                <br>
            </div>
        </div>
    </div>
</div>