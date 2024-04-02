$(function () {
  // 編集ボタン(js-modal-open)をクリックしたら発火
  $('.js-modal-open').on('click', function () {

    // モーダルの中身をフェードインして表示する
    $('js-modal').fadeIn();

    // 押されたボタン（編集ボタン）から投稿内容を取得・変数へ格納
    // thisはjs-modal-openのこと
    var post = $(this).attr('post');
    var post_id = $(this).attr('post_id');

    // 上記で取得したデータをモーダルの中身へ渡す。
    // textメソッドの引数にpostと記述すると、テキストを取得できる。
    // val()とはHTMLタグ内に記述されているvalue属性を取得したり変更することができるメソッド。
    $('.modal_post').text(post);
    $('.modal_id').val(post_id);
    return false;

  });

  // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
  $('.js-modal-close').on('click', function () {

    // モーダルの中身(js-modal)を非表示
    $('.js-modal').fadeOut();
  });

});
