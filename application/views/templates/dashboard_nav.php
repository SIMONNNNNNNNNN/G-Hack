<script>
    var base_url = "<?php echo base_url() ?>";
</script>

<div class="row">
<aside clas="col-lg-5 dashboard">
    <ul class="nav flex-column col-lg-5 ml-lg-4 mt-lg-4">

        <li class="nav-item" style="width: 15rem;">
            <a class="nav-link text-dark" href="<?php echo base_url('dashboard'); ?>">
                <i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard
            </a>
        </li>

        <li class="nav-item" style="width: 15rem;">
            <a class="nav-link text-dark" href="<?php echo site_url();?>account/profile">
                <i class="fas fa-user-circle"></i>&nbsp;Profile
            </a>
        </li>

        <li class="nav-item" style="width: 15rem;">
            <a class="nav-link text-dark" onclick="volunteerDisplay()">
                <i class="fas fa-hands-helping"></i>&nbsp;Volunteering
            </a>
        </li>
    </ul>
</aside>

