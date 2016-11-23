只是想要實作看看Google login，所以按鈕並沒有符合Google規範哈哈。

用了兩種方式接，一種是用js(+php)，一種是純後端(php)，
程式碼分別在 `with-js` 和 `with-server`下面。

:warning:
- 憑證不包含在repository裡面
  - 在根目錄下放上從google api console裡面下載的JSON憑證，並命名為 `client_secret.json`
  - 更改 `config.php` ，將裡面替換成自己的 client id 即可
- google api client程式碼也不在裡面
  - clone下來執行 `composer install` 即可
