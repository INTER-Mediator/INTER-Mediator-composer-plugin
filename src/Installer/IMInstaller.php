<?php

namespace INTERMediator\Installer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

use function file_exists;
use function sprintf;

class ModuleInstallerPlugin implements PluginInterface
{
    /** @var \SimpleSAML\Composer\ModuleInstaller */
    private ModuleInstaller $installer;

    /** @var \Composer\IO\IOInterface */
    private IOInterface $io;


    /**
     * Apply plugin modifications to Composer
     *
     * @param \Composer\Composer $composer
     * @param \Composer\IO\IOInterface $io
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $this->io = $io;
        $this->installer = new ModuleInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($this->installer);
    }


    /**
     * Remove any hooks from Composer
     *
     * This will be called when a plugin is deactivated before being
     * uninstalled, but also before it gets upgraded to a new version
     * so the old one can be deactivated and the new one activated.
     *
     * @param \Composer\Composer $composer
     * @param \Composer\IO\IOInterface $io
     */
    public function deactivate(Composer $composer, IOInterface $io)
    {
        // Not implemented
    }


    /**
     * Prepare the plugin to be uninstalled
     *
     * This will be called after deactivate.
     *
     * @param \Composer\Composer $composer
     * @param \Composer\IO\IOInterface $io
     */
    public function uninstall(Composer $composer, IOInterface $io)
    {
        // Not implemented
    }
}