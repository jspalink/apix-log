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

namespace Apix\Log\tests\Logger;

use Apix\Log\Logger\Runtime;

class RuntimeTest extends TestCase
{
    protected $logger;

    protected function setUp()
    {
        $this->logger = new Runtime();
    }

    protected function tearDown()
    {
        unset($this->logger);
    }

    /**
     * {@inheritDoc}
     */
    public function getLogs()
    {
        return $this->_normalizeLogs($this->logger->getItems());
    }

    /**
     * {@inheritDoc}
     */
    public function getLogger()
    {
        return $this->logger;
    }

    public function testAbstractLogger()
    {
        $context = array('foo', 'bar');
        $this->logger->debug('msg', $context);
        $this->logger->error('msg', $context);

        $logs = $this->logger->getItems();

        $this->assertSame(2, count($logs));
        $this->assertSame(array('debug msg', 'error msg'), $this->_normalizeLogs($logs));
    }

}
