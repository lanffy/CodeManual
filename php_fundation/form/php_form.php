<!DOCTYPE html>
<html>
    <body>
        <h1>POST method:</h1>
        <form action="welcome.php" method="post">
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" /></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email" /></td>
                </tr>
                <tr>
                    <td cowspan=2>
                        <input type="submit">
                    </td>
                </tr>
            </table>
        </form>
        <hr />
        <h1>GET method:</h1>
         <form action="welcome.php" method="get">
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" /></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email" /></td>
                </tr>
                <tr>
                    <td cowspan=2>
                        <input type="submit">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
