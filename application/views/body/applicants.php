
<div class="panel panel-flat">
    <div class="panel-heading">
    </div>
    <div class="panel-body">
        <div class="col-lg-10">
        <h5>List of registered applicants</h5>
            <table class="table table-striped" style="width:100%">
                <tr>
                   <th>SN</th>
                   <th>First Name</th>
                    <th>Surname</th>
                    <th>Phone Number</th>
                    <th>Email Address</th>
                    <th>Passport</th>
                </tr>
                <?php if(isset($applicants)) foreach($applicants as $applicant):?>
                <tr>
                    <td><?php echo @$count += 1; ?></td>
                    <td><?php echo htmlspecialchars($applicant->first_name); ?></td>
                    <td><?php echo htmlspecialchars($applicant->surname); ?></td>
                    <td><?php echo htmlspecialchars($applicant->phone_number); ?></td>
                    <td><?php echo htmlspecialchars($applicant->email); ?></td>
                    <td> <img width="30%" src="<?php echo base_url() . "files/" . $applicant->passport?>" alt="passport" /></td>

                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>