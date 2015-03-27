<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php echo 'hello world' ?>
<?php
{
                HttpWebRequest request = (HttpWebRequest)WebRequest.Create("http://remote/fromphp.php");
                
                HttpWebResponse response = (HttpWebResponse)request.GetResponse();
                StreamReader input = new StreamReader(response.GetResponseStream());

                DataSet dsTest = new DataSet();
                dsTest.ReadXml(input);
               

                int i,j, varTotCol = dsTest.Tables[0].Columns.Count, varTotRow = dsTest.Tables[0].Rows.Count;
                for (j = 0; j < varTotRow; j++)
                {

                    for (i = 0; i < varTotCol; i++)
                    {
                        MessageBox.Show(dsTest.Tables[0].Rows[j]Idea.ToString());
                    }
                }
            
            }
            catch (Exception Except)
            {
                MessageBox.Show(Except.ToString());
            }

PHP Code:
<?
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";

echo "<MessageXML>";

echo "<Message>";
echo "<MsgID>Msg</MsgID>";
echo "<From>Kannan</From>";
echo "<Email>b_kannan@server.com</Email>";
echo "<MsgDate>01/01/1001</MsgDate>";
echo "<MsgTime>01:01:01</MsgTime>";
echo "</Message>";

echo "<Message>";
echo "<MsgID>Msg</MsgID>";
echo "<From>Kannan</From>";
echo "<Email>b_kannan@server.com</Email>";
echo "<MsgDate>01/01/1001</MsgDate>";
echo "<MsgTime>01:01:01</MsgTime>";
echo "</Message>";

echo "</MessageXML>";
?>


Now in PHP its simple to connect to MySQL and add the return data in between the tags.

Usefull PHP Code returning data from MySQL Database:
<?

$dbhost = 'localhost';
$dbuser = 'user';
$dbpass = 'password';
$dbname = 'database;

//Connecting to DB
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
mysql_select_db($dbname);

$query  = "SELECT * FROM users";
$result = mysql_query($query);
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<MessageXML>";
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
 echo "<Data>"."<Email>{$row['email']}</Email>"."<Name>{$row['name']}</Name>"."<Password>{$row['password']}</Password>"."<Question>{$row['question']}</Question>"."<Answer>{$row['answer']}</Answer>"."</Data>";
} 
echo "</MessageXML>";
mysql_close($conn);
?>
?>
</body>
</html>
