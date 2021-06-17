<div style="padding:20px;">
    <title>User Dashboard: Extend Due Date</title>
    <h1>User Extend Due Date</h1>
    <form action="payQuery" method="POST">
        <table>
            <tr>
                <td>Please choose an option:</td>
                <td>
                    <select name="pay" id="pay">
                        <option value="10">$10 / 1 month</option>
                        <option value="35">$35 / 4 months</option>
                        <option value="100">$100 / 1 year</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <button type="submit" class="detail-button">Transaction</button>
                </td>
            </tr>

        </table>
    </form>
</div>