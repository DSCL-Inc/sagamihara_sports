const FtpDeploy = require("ftp-deploy");
const ftpDeploy = new FtpDeploy();

// アップロードが始まったことをコンソールに表示する
console.log("deploy start!!");
ftpDeploy
  .deploy({
    user: "tnlab", // ユーザー名
    password: "C3JHekwb77pJ", // パスワード
    host: "tnlab.s9.valueserver.jp", // ホスト名
    localRoot: __dirname + "/site/", // アップロードしたいローカルのルート
    remoteRoot: "public_html/nishinokoumuten.tnlab.site/", // リモートのルート
    include: ["*", "**/*"], // アップロードするファイルやディレクトリ。この場合はドットファイルを除くすべて
    deleteRemote: false, // アップロード前にリモートのファイルを削除するか否か
    forcePasv: true // Passiveモードを強制するか否か
  })
  .then(res => {
    // アップロードが終わったことをコンソールに表示する
    console.log("deploy finished!!", res);
  })
  .catch(err => console.log(err));
ftpDeploy.on("uploading", data => {
  console.log(
    "転送されたファイルの数: ",
    `${data.transferredFileCount} / ${data.totalFilesCount}`
  );
  console.log("ファイル名: ", data.filename);
});
