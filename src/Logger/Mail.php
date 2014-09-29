<?php

/**
 *
 * This file is part of the Apix Project.
 *
 * (c) Franck Cassedanne <franck at ouarz.net>
 *
 * @license     http://opensource.org/licenses/BSD-3-Clause  New BSD License
 *
 */

namespace Apix\Log\Logger;

use Psr\Log\InvalidArgumentException;

/**
 * Mail log wrapper.
 *
 * @author Franck Cassedanne <franck at ouarz.net>
 */
class Mail extends ErrorLog implements LoggerInterface
{

    /**
     * Constructor.
     *
     * @param  string                           $Email   Email addr to append to.
     * @param  string|null                      $headers A string of additional (mail) headers.
     * @see http://php.net/manual/en/function.mail.php
     * @throws Psr\Log\InvalidArgumentException If the email does not validate.
     */
    public function __construct($email, $headers = null)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf('"%s" is an invalid email address', $email)
            );
        }

        $this->destination = $email;
        $this->type = static::MAIL;
        $this->headers = $headers;
    }

}