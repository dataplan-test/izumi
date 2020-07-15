<?php
/**
*	プラグイン
*/

/**
 * MW WP Formの送信日時フィルターフック
 *
 * {send_datetime} としたときに送信日時に変換して送信する
 *
 * @param string $value 送信された値
 * @param string $key メールタグ
 * @param int $insert_contact_data_id データベースに保存した場合、そのときの Post ID
 */
function send_date_time( $value, $key, $insert_contact_data_id ) {
    if ( $key === 'send_datetime' ) {
        return date_i18n( 'Y.m.d H時i分' );
    }
    return $value;
}
add_filter( 'mwform_custom_mail_tag_mw-wp-form-30', 'send_date_time', 10, 3 );