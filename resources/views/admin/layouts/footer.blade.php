<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-{!! date('Y') !!} <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('user/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Custom scripts for this template -->
<script src="{{ asset('user/js/clean-blog.min.js')}}"></script>

<!-- jQuery 3 -->
<script src="{{ asset('../../admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('../../admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('../../admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('../../admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('../../admin/dist/js/demo.js')}}"></script>


@section('footerSection')
    @show
