<div style="padding:20px;">
    <title>User Dashboard: View Information</title>
    <h1>User View Information</h1>
    <table>
        <tr>
            <td>Email:</td>
            <td><?php echo $data[0]["User"]["email"]; ?></td>
        </tr>

        <tr>
            <td>Name:</td>
            <td><?php echo $data[0]["User"]["name"]; ?></td>
        </tr>

        <tr>
            <td>Date of birth:</td>
            <td><?php echo date("d-m-Y", strtotime($data[0]["User"]["date_of_birth"])); ?></td>
        </tr>

        <tr>
            <td>Expired date:</td>
            <td><?php echo date("d-m-Y", strtotime($data[0]["User"]["expired_date"])); ?></td>
        </tr>

        <tr>
            <td>
                <form action="<?php echo LINK; ?>/user/editInformation">
                    <button type="submit" class="detail-button" value="">Edit Information</button>
                </form>
            </td>
            <td>
                <form action="<?php echo LINK; ?>/user/pay">
                    <button type="submit" class="detail-button" value="">Extend Due Date</button>
                </form>
            </td>
        </tr>

    </table>
</div>