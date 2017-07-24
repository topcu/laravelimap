<?php
/**
 * Created by PhpStorm.
 * User: cagri
 * Date: 10.5.2017
 * Time: 18:05
 */

namespace Topcu\LaravelImap;

use PhpImap\Mailbox as PhPImapMailbox;
use PhpImap\Exception as PhPImapException;

class Mailbox extends PhPImapMailbox{

    /**
     * Its possible to set & reset connection parameters via setConnection
     *
     *
     * @param null $config
     * @throws Exception
     */
    public function __construct($config=null)
    {
        if(!empty($config)) {
           $this->connection($config);
        }
    }

    /**
     *
     * Set new connection parameters.
     * Disconnects if already connected to a server.
     *
     * array[imap_path] required  @see http://php.net/manual/en/function.imap-open.php for parameters
     * array[login] required
     * array[password] required
     * array[server_encoding] default: UTF-8 MIME character set to use when searching strings. @see http://php.net/manual/en/function.imap-search.php
     *
     * @param array $config (See above)
     * @throws \PhpImap\Exception
     */
    public function connection($config)
    {
        $this->disconnect();
        $this->imapPath = $config["imap_path"];
        $this->imapLogin = $config["login"];
        $this->imapPassword = $config["password"];
        $this->serverEncoding = strtoupper(array_Get($config, "server_encoding", "UTF-8"));
        $attachments_dir = array_get($config, "attachments_dir");

        if($attachments_dir) {
            if(!is_dir($attachments_dir)) {
                throw new PhPImapException('Directory "' . $attachments_dir. '" not found');
            }
            $this->attachmentsDir = rtrim(realpath($attachments_dir), '\\/');
        }
        return $this;
    }
}