<?php

namespace Concrete\Package\OrticForum;

use Concrete\Core\Backup\ContentImporter;
use Concrete\Package\OrticForum\Src\Repository\Forum;
use Package;
use Core;

class Controller extends Package
{
    protected $pkgHandle = 'ortic_forum';
    protected $appVersionRequired = '5.8';
    protected $pkgVersion = '0.0.1';

    public function getPackageName()
    {
        return t('Ortic Forum');
    }

    public function getPackageDescription()
    {
        return t('Simple forum solution');
    }

    public function install()
    {
        parent::install();
        $this->installXml();
    }

    public function upgrade()
    {
        $this->installXml();
        parent::upgrade();
    }

    protected function installXml()
    {
        $pkg = Package::getByHandle($this->pkgHandle);
        $ci = new ContentImporter();
        $ci->importContentFile($pkg->getPackagePath() . '/install.xml');
    }

    public function on_start()
    {
        Core::bind('ortic/forum', function () {
            return new Forum();
        });
    }
}