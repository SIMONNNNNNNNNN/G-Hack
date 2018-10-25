<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('.functional_table',).DataTable({
            "order": [[ 0, "asc" ]]
        });
        
        $('.functional_table_datasets',).DataTable({
            "order": [[ 0, "asc" ]],
            "columnDefs": [
                { "width": "10%", "targets": 3 }
                // { "width": "20%", "targets": 1 },
                // { "width": "10%", "targets": 2 },
                // { "width": "50%", "targets": 3 },
                // { "width": "10%", "targets": 4 },
            ]
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>
<!-- Save base_url from php into javascript variable for the usage of Ajax -->
<script>
    var base_url = "<?php echo base_url() ?>";
</script>

<div class="row">
<aside clas="col-md-4 dashboard">
    <ul class="nav flex-column col-md-4 ml-lg-4 mt-lg-4">
        
<!-- 
        <li class="nav-item" style="width: 15rem;">
            <a class="nav-link text-dark" href="<?php echo base_url('dashboard'); ?>">
                <i class="fas fa-trophy"></i>&nbsp;Competitions
            </a>
        </li> -->


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
            <a class="nav-link text-dark" onclick="volunteerManage()">
                <i class="fas fa-hands-helping"></i>&nbsp;Volunteering
            </a>
        </li>
        <li class="nav-item" style="width: 15rem;">
            <a class="nav-link text-dark" href="<?php echo site_url();?>privilege/index">
                <i class="fas fa-cog"></i>&nbsp;Manage Users
            </a>
        </li>
    </ul>
</aside>