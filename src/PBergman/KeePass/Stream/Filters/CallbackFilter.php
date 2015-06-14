<?php
/**
 * @author    Philip Bergman <pbergman@live.nl>
 * @copyright Philip Bergman
 */
namespace PBergman\KeePass\Stream\Filters;

/**
 * Class CallbackFilter
 *
 * wrapper quickly create stream filter
 *
 * @package PBergman\KeePass
 */
class CallbackFilter extends \php_user_filter
{
    function filter($in, $out, &$consumed, $closing)
    {
        while ($bucket = stream_bucket_make_writeable($in)) {
            if (is_callable($this->params)) {
                $bucket->data = call_user_func($this->params, $bucket->data);
            } else {
                return PSFS_ERR_FATAL;
            }
            $bucket->datalen = strlen($bucket->data);
            $consumed += $bucket->datalen;
            stream_bucket_append($out, $bucket);
        }
        return PSFS_PASS_ON;
    }
}