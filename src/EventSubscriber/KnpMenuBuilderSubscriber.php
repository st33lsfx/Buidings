<?php
// src/EventSubscriber/KnpMenuBuilderSubscriber.php
namespace App\EventSubscriber;

use KevinPapst\AdminLTEBundle\Event\KnpMenuEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class KnpMenuBuilderSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents(): array
    {
        return [
            KnpMenuEvent::class => ['onSetupMenu', 100],
        ];
    }

    public function onSetupMenu(KnpMenuEvent $event)
    {
        $menu = $event->getMenu();

        $menu->addChild('MainNavigationMenuItem', [
            'label' => 'MAIN NAVIGATION',
            'childOptions' => $event->getChildOptions()
        ])->setAttribute('class', 'header');

        $menu->addChild('Building', [
            'label' => 'Building',
            'childOptions' => $event->getChildOptions(),
            'extras' => [
                'badge' => [
                    'color' => 'yellow',
                    'value' => 1,
                ],
            ],
        ])->setLabelAttribute('icon', 'fas fa-tachometer-alt');

        $menu->getChild('Building')->addChild('ChildOneItemId', [
            'route' => 'app_building_homepage',
            'label' => 'All building',
            'extras' => [
                'badges' => [
                    [ 'value' => 2, 'color' => 'blue' ],
                ],
            ],
            'childOptions' => $event->getChildOptions()
        ])->setLabelAttribute('icon', 'fas fa-home');

        $menu->getChild('Building')->addChild('ChildTwoItemId', [
            'route' => 'app_building_create',
            'label' => 'New building',
            'extras' => [
                'badges' => [
                    [ 'value' => 2, 'color' => 'blue' ],
                ],
            ],
            'childOptions' => $event->getChildOptions()
        ])->setLabelAttribute('icon', 'fas fa-building');
    }
}