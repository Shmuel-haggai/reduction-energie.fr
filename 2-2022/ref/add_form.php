<?php

$type_bien    = htmlspecialchars($_POST['type_bien'], ENT_QUOTES);
$proprietaire = htmlspecialchars($_POST['proprietaire'], ENT_QUOTES);
$energie      = htmlspecialchars($_POST['energie'], ENT_QUOTES);

echo shell_exec("curl -fsSLk 'https://excellence-energie.fr/chaudiere-a-granules/add_form.php' \
  -H 'sec-ch-ua: \".Not/A)Brand\";v=\"99\", \"Google Chrome\";v=\"103\", \"Chromium\";v=\"103\"' \
  -H 'accept-language: fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7' \
  -H 'sec-ch-ua-mobile: ?0' \
  -H 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36' \
  -H 'content-type: application/x-www-form-urlencoded; charset=UTF-8' \
  -H 'accept: text/plain, */*; q=0.01' \
  -H 'Referer: https://www.communications-appero.co/' \
  -H 'x-requested-with: XMLHttpRequest' \
  -H 'sec-ch-ua-platform: \"macOS\"' \
  --data-raw 'etape=1&type_bien=".$type_bien."&proprietaire=".$proprietaire."&energie=".$energie."' \
  --compressed");

?>