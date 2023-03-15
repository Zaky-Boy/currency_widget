<?php
  $page = $_SERVER['PHP_SELF'];
  $sec = "600"; // the page will refresh every 10min.
  // the easy way to refresh the widget is to refresh all page
  // if we want to refresh only the widget 
  // then we have to encapsulate pulling and fetching the json data
  // in function and addEventListener (button click) or run timer to call this function...
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Exchange Rates Widget</title>
    <!--<link rel="stylesheet" href="style.css" />-->
    <style>
 			table th { background-color:lightblue; }
			table, tr, td { border-collapse:collapse; }
			table tr:nth-child(odd) { background-color:#fdf6e9; }
      .floatright { 
        position: fixed; 
        float: right; 
        top:50px; 
        right:50px; 
        border:3px solid lightblue; 
        border-radius: 10px;
        width: 180px; 
        padding: 5px;
      }
      .divheader { background-color:lightblue; }
      .content { position: relative; width: 400px; margin: 0 auto;}
    </style>
  </head>

<?php
// initialize 
$endpoint = 'latest';
$api_key = '17225b451183128fb7d23eea';
$currency = "GBP";

// Fetching JSON
$url = 'https://v6.exchangerate-api.com/v6/'.$api_key.'/'.$endpoint.'/'.$currency;
$json = file_get_contents($url);

// Continuing if we got a result
if($json !== false) {
    try {
      $response = json_decode($json);
      if('success' === $response->result) {
        $base_value = 1;
        $EUR = round(($base_value * $response->conversion_rates->EUR), 2);
        $USD = round(($base_value * $response->conversion_rates->USD), 2);
        $JPY = round(($base_value * $response->conversion_rates->JPY), 2);
        $CAD = round(($base_value * $response->conversion_rates->CAD), 2);
        $CHF = round(($base_value * $response->conversion_rates->CHF), 2);
        $AUD = round(($base_value * $response->conversion_rates->AUD), 2);
        $RUB = round(($base_value * $response->conversion_rates->RUB), 2);
      }
    }
    catch(Exception $e) {
        echo $e;
        //echo "JSON response error!";
    }
}
?>

<body>
    <div class="content">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio dolorum nisi laudantium cupiditate, animi odio blanditiis iure non accusamus deserunt sint, ut voluptatum dolor architecto enim voluptas doloremque harum. Minima perspiciatis numquam tempore provident eligendi sit aliquid animi quisquam rem tempora porro quibusdam consequatur eos ex aperiam mollitia incidunt deserunt, modi ullam adipisci. Reiciendis voluptates similique labore dolorem tenetur dolor dicta odio quod enim necessitatibus? Eos soluta commodi, explicabo minus deserunt, iste ullam culpa, nam dolores amet quidem? Corporis reiciendis recusandae saepe alias possimus, qui, eos distinctio facere ratione ut ad voluptate fugiat autem a et dolorem aut quidem fugit assumenda perspiciatis error sint unde. Debitis perspiciatis dolor alias officia soluta! Esse numquam natus ipsa ab magni ad dignissimos perferendis voluptatem cum suscipit reprehenderit pariatur quo voluptate cupiditate dolorem, fuga ducimus, qui hic? Ipsum ipsa in rem, fugit quos, a voluptatum ex possimus quasi aut ducimus consequuntur officia alias consequatur accusantium! Quaerat doloribus, magnam fugit quae veniam optio consequuntur itaque ducimus explicabo debitis, obcaecati eligendi odio exercitationem similique error? Totam repellat natus corrupti dolores libero, sequi ipsam ducimus adipisci voluptas repellendus quae quam deleniti praesentium ab accusantium iure? Optio saepe sit mollitia eligendi maiores accusantium est culpa fuga possimus, quod assumenda dolore exercitationem alias sunt tempore consequatur iure quia nostrum aspernatur inventore. Harum, placeat itaque. Sunt eaque esse vel officia sit placeat, quos sint ea laboriosam vitae deleniti provident et. Temporibus provident laborum quas qui fugiat accusamus cumque assumenda magnam reiciendis aperiam, dignissimos commodi aliquid. Porro aut velit quas doloribus aspernatur? Accusamus architecto quam suscipit repellendus in, vel obcaecati cumque, illo perspiciatis asperiores, modi vitae provident consectetur neque? Adipisci accusamus dicta totam distinctio accusantium!</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio dolorum nisi laudantium cupiditate, animi odio blanditiis iure non accusamus deserunt sint, ut voluptatum dolor architecto enim voluptas doloremque harum. Minima perspiciatis numquam tempore provident eligendi sit aliquid animi quisquam rem tempora porro quibusdam consequatur eos ex aperiam mollitia incidunt deserunt, modi ullam adipisci. Reiciendis voluptates similique labore dolorem tenetur dolor dicta odio quod enim necessitatibus? Eos soluta commodi, explicabo minus deserunt, iste ullam culpa, nam dolores amet quidem? Corporis reiciendis recusandae saepe alias possimus, qui, eos distinctio facere ratione ut ad voluptate fugiat autem a et dolorem aut quidem fugit assumenda perspiciatis error sint unde. Debitis perspiciatis dolor alias officia soluta! Esse numquam natus ipsa ab magni ad dignissimos perferendis voluptatem cum suscipit reprehenderit pariatur quo voluptate cupiditate dolorem, fuga ducimus, qui hic? Ipsum ipsa in rem, fugit quos, a voluptatum ex possimus quasi aut ducimus consequuntur officia alias consequatur accusantium! Quaerat doloribus, magnam fugit quae veniam optio consequuntur itaque ducimus explicabo debitis, obcaecati eligendi odio exercitationem similique error? Totam repellat natus corrupti dolores libero, sequi ipsam ducimus adipisci voluptas repellendus quae quam deleniti praesentium ab accusantium iure? Optio saepe sit mollitia eligendi maiores accusantium est culpa fuga possimus, quod assumenda dolore exercitationem alias sunt tempore consequatur iure quia nostrum aspernatur inventore. Harum, placeat itaque. Sunt eaque esse vel officia sit placeat, quos sint ea laboriosam vitae deleniti provident et. Temporibus provident laborum quas qui fugiat accusamus cumque assumenda magnam reiciendis aperiam, dignissimos commodi aliquid. Porro aut velit quas doloribus aspernatur? Accusamus architecto quam suscipit repellendus in, vel obcaecati cumque, illo perspiciatis asperiores, modi vitae provident consectetur neque? Adipisci accusamus dicta totam distinctio accusantium!</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio dolorum nisi laudantium cupiditate, animi odio blanditiis iure non accusamus deserunt sint, ut voluptatum dolor architecto enim voluptas doloremque harum. Minima perspiciatis numquam tempore provident eligendi sit aliquid animi quisquam rem tempora porro quibusdam consequatur eos ex aperiam mollitia incidunt deserunt, modi ullam adipisci. Reiciendis voluptates similique labore dolorem tenetur dolor dicta odio quod enim necessitatibus? Eos soluta commodi, explicabo minus deserunt, iste ullam culpa, nam dolores amet quidem? Corporis reiciendis recusandae saepe alias possimus, qui, eos distinctio facere ratione ut ad voluptate fugiat autem a et dolorem aut quidem fugit assumenda perspiciatis error sint unde. Debitis perspiciatis dolor alias officia soluta! Esse numquam natus ipsa ab magni ad dignissimos perferendis voluptatem cum suscipit reprehenderit pariatur quo voluptate cupiditate dolorem, fuga ducimus, qui hic? Ipsum ipsa in rem, fugit quos, a voluptatum ex possimus quasi aut ducimus consequuntur officia alias consequatur accusantium! Quaerat doloribus, magnam fugit quae veniam optio consequuntur itaque ducimus explicabo debitis, obcaecati eligendi odio exercitationem similique error? Totam repellat natus corrupti dolores libero, sequi ipsam ducimus adipisci voluptas repellendus quae quam deleniti praesentium ab accusantium iure? Optio saepe sit mollitia eligendi maiores accusantium est culpa fuga possimus, quod assumenda dolore exercitationem alias sunt tempore consequatur iure quia nostrum aspernatur inventore. Harum, placeat itaque. Sunt eaque esse vel officia sit placeat, quos sint ea laboriosam vitae deleniti provident et. Temporibus provident laborum quas qui fugiat accusamus cumque assumenda magnam reiciendis aperiam, dignissimos commodi aliquid. Porro aut velit quas doloribus aspernatur? Accusamus architecto quam suscipit repellendus in, vel obcaecati cumque, illo perspiciatis asperiores, modi vitae provident consectetur neque? Adipisci accusamus dicta totam distinctio accusantium!</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio dolorum nisi laudantium cupiditate, animi odio blanditiis iure non accusamus deserunt sint, ut voluptatum dolor architecto enim voluptas doloremque harum. Minima perspiciatis numquam tempore provident eligendi sit aliquid animi quisquam rem tempora porro quibusdam consequatur eos ex aperiam mollitia incidunt deserunt, modi ullam adipisci. Reiciendis voluptates similique labore dolorem tenetur dolor dicta odio quod enim necessitatibus? Eos soluta commodi, explicabo minus deserunt, iste ullam culpa, nam dolores amet quidem? Corporis reiciendis recusandae saepe alias possimus, qui, eos distinctio facere ratione ut ad voluptate fugiat autem a et dolorem aut quidem fugit assumenda perspiciatis error sint unde. Debitis perspiciatis dolor alias officia soluta! Esse numquam natus ipsa ab magni ad dignissimos perferendis voluptatem cum suscipit reprehenderit pariatur quo voluptate cupiditate dolorem, fuga ducimus, qui hic? Ipsum ipsa in rem, fugit quos, a voluptatum ex possimus quasi aut ducimus consequuntur officia alias consequatur accusantium! Quaerat doloribus, magnam fugit quae veniam optio consequuntur itaque ducimus explicabo debitis, obcaecati eligendi odio exercitationem similique error? Totam repellat natus corrupti dolores libero, sequi ipsam ducimus adipisci voluptas repellendus quae quam deleniti praesentium ab accusantium iure? Optio saepe sit mollitia eligendi maiores accusantium est culpa fuga possimus, quod assumenda dolore exercitationem alias sunt tempore consequatur iure quia nostrum aspernatur inventore. Harum, placeat itaque. Sunt eaque esse vel officia sit placeat, quos sint ea laboriosam vitae deleniti provident et. Temporibus provident laborum quas qui fugiat accusamus cumque assumenda magnam reiciendis aperiam, dignissimos commodi aliquid. Porro aut velit quas doloribus aspernatur? Accusamus architecto quam suscipit repellendus in, vel obcaecati cumque, illo perspiciatis asperiores, modi vitae provident consectetur neque? Adipisci accusamus dicta totam distinctio accusantium!</p>
    </div>
    <div id="widget" class="floatright">
      <table>
        <tr>
          <th colspan=2> <img src="gb.png"> GBP Exchange Rates </th>
        </tr>
        <tr>
          <td colspan="2" style="text-align:right;"> £1 GBP = </td>
        </tr>
        <tr>
          <td><img src="eu.png"> EUR </td>
          <td style="text-align:right;"> <?=$EUR;?> </td>
        </tr>
        <tr>
          <td><img src="us.png"> USD </td>
          <td style="text-align:right;"> <?=$USD;?> </td>
        </tr>
        <tr>
          <td><img src="gb.png"> JPY </td>
          <td style="text-align:right;"> <?=$JPY;?> </td>
        </tr>
        <tr>
          <td><img src="ca.png"> CAD </td>
          <td style="text-align:right;"> <?=$CAD;?> </td>
        </tr>
        <tr>
          <td><img src="cn.png"> CHF </td>
          <td style="text-align:right;"> <?=$CHF;?> </td>
        </tr>
        <tr>
          <td><img src="au.png"> AUD </td>
          <td style="text-align:right;"> <?=$AUD;?> </td>
        </tr>
        <tr>
          <td><img src="ru.png"> RUB </td>
          <td style="text-align:right;"> <?=$RUB;?> </td>
        </tr>
        <tr>
          <td width="70"> 
            <button onclick="window.location.href='widget.php'"> &#128260; </button> 
          </td>
          <td style="text-align:right; color:#888888; font-size:10px;">
          Rates: &nbsp; <?php echo $response->time_last_update_utc; ?>
        </tr>
      </table>
    </div>

</body>
</html>