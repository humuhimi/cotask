2018/09/05

今日から掲示板作成課題に入ります

入力画面 input(input.php)

登録画面(必要機能)

名前(全角)
ふりがな（全角)

* input をbuttonに直せるなら直す

___  ___  ___




性別 type:radio button
生年月日　type:date
メアド(半角)
メアド確認入力
電話番号
最終学歴 (学校名
　　　　　学部など)
特技　textarea 多分サイズを指定しなければ可変可能

確認ボタン->confirm.php
resetボタン  type:reset

*maxlengthで桁数制限をする
________________________________________________________________________________

確認画面 confirm(confirm.php)

入力画面で入力した内容を表示する

確認ボタン->finish.php 完了画面に映る/DBに内容を登録する
戻るボタン->input.php　入力した内容に戻る/session or cookieで入力内容を保持したままにする
_ _ _ _ _ _ _
確認ボタンの立体化
________________________________________________________________________________
mysql db_BBS 作成
項目
id: auto_increment,primary key
名前(全角):varchar(255)
ふりがな（全角):varchar(255)
性別 :char(1)
生年月日 :datetime
メアド(半角):text
電話番号:varchar(255)
最終学歴 学校名 varchar
　　　　　学部など varchar
特技　 text






________________________________________________________________________________

完了画面 finish (finish.php)

操作完了を表示
確認ボタン->history.php
________________________________________________________________________________

履歴一覧 history (history.php)

最新の登録内容を表示する

検索機能 名前/性別/学校名/電話番号で検索
リセット機能 →history.php初期状態に戻るでよくないか?

編集機能 :dbからPDOでdelete

削除機能 :dbからPDOでupdate
____ __ ____ ____ ____ ______ _____ ______ ______ _____ _____ _____ ____ _____ _
history.phpに追加する機能↓

upload機能で画像の追加の処理に移る
画像upload->upload.php
________________________________________________________________________________
画像upload確認画面　(upload.php)

画像をuploadする
browseボタン :  画像のみを表示する機能

確認ボタン->image.php
リセットボタン->history.php
________________________________________________________________________________
画像upload確認画面(image.php)

確認ボタン->done.php
: 画像をDBに追加する

: そして、その画像をhistory.phpのコンテンツ先頭に表示する

戻るボタン->upload.php
________________________________________________________________________________
画像アップロード確認画面(done.php)

操作完了を表示

確認ボタン->history.php
________________________________________________________________________________
smarty template
________________________________________________________________________________
....できたら.....


全部のクラス化
# cotask
