<?php

namespace AnsjTextUnderImage;

use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AnsjTextUnderImage extends Plugin
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
//        die('load');
        $container->setParameter('ansj_text_under_image.plugin_name', $this->getName());
        $container->setParameter('ansj_text_under_image.plugin_dir', $this->getPath());
        parent::build($container);
    }
}
