<?php
/**
 * @author    Philip Bergman <pbergman@live.nl>
 * @copyright Philip Bergman
 */

namespace PBergman\KeePass\Exceptions;

/**
 * Class    OptionNotAllowedException
 *
 * @package PBergman\KeePass\Exceptions
 */
class OptionNotAllowedException extends \Exception
{

    public function __construct($option, array $allowed, $code = 0, \Exception $previous = null)
    {
        $message = sprintf(
            'Option "%s" not allowed, valid options: [%s]',
            $option,
            implode(', ',$allowed)
        );

        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return sprintf(
            "%s: %s\n",
            __CLASS__,
            $this->message
        );
    }

}
