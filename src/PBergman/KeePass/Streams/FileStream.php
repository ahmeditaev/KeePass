<?php
/**
 * @author    Philip Bergman <philip@zicht.nl>
 * @copyright Zicht Online <http://www.zicht.nl>
 */

namespace PBergman\KeePass\Streams;

/**
 * Class FileStream
 *
 * @package PBergman\KeePass\Streams
 */
class FileStream extends AbstractStreamWrapper
{
    /**
     * @return resource
     */
    protected function getResource($data)
    {
        if (!is_file($data)) {
            throw new \InvalidArgumentException(sprintf('Could not find file: %s', $data));
        }

        if (false === $handler = fopen($data, 'r+b')) {
            throw new \RuntimeException('Could not create resource');
        }

        return $handler;
    }
}