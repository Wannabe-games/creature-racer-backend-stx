<?php

namespace App\Common\Enum;

/**
 * Class PlayerDefault.
 */
class PlayerDefault
{   
    public static array $defaultAdditionalData =
        array (
            'IsFirstRaceCompleted' => false,
            'SoftCurrency' => 0,
            'HardCurrency' => 0,
            'Energy_' =>
                array (
                    'Value' => 10,
                    'RestoreStartTime' => 0,
                ),
            'PlayerProgress_' =>
                array (
                    'TierEvents' =>
                        array (
                            0 =>
                                array (
                                    'TierType' => 'tier1',
                                    'TierEventType' => 'boss',
                                    'RacesFinished' => 0,
                                    'Params' => '',
                                ),
                            1 =>
                                array (
                                    'TierType' => 'tier1',
                                    'TierEventType' => 'ladder',
                                    'RacesFinished' => 0,
                                    'Params' => '',
                                ),
                            2 =>
                                array (
                                    'TierType' => 'tier1',
                                    'TierEventType' => 'regullar',
                                    'RacesFinished' => 0,
                                    'Params' => '',
                                ),
                            3 =>
                                array (
                                    'TierType' => 'tier1',
                                    'TierEventType' => 'daily',
                                    'RacesFinished' => 0,
                                    'Params' => 'ride_timestamp=0;ride_won_timestamp=0;days_in_a_row=0',
                                ),
                            4 =>
                                array (
                                    'TierType' => 'tier2',
                                    'TierEventType' => 'boss',
                                    'RacesFinished' => 0,
                                    'Params' => '',
                                ),
                            5 =>
                                array (
                                    'TierType' => 'tier2',
                                    'TierEventType' => 'ladder',
                                    'RacesFinished' => 0,
                                    'Params' => '',
                                ),
                            6 =>
                                array (
                                    'TierType' => 'tier2',
                                    'TierEventType' => 'regullar',
                                    'RacesFinished' => 0,
                                    'Params' => '',
                                ),
                            7 =>
                                array (
                                    'TierType' => 'tier2',
                                    'TierEventType' => 'daily',
                                    'RacesFinished' => 0,
                                    'Params' => 'ride_timestamp=0;ride_won_timestamp=0;days_in_a_row=0',
                                ),
                            8 =>
                                array (
                                    'TierType' => 'tier3',
                                    'TierEventType' => 'boss',
                                    'RacesFinished' => 0,
                                    'Params' => '',
                                ),
                            9 =>
                                array (
                                    'TierType' => 'tier3',
                                    'TierEventType' => 'ladder',
                                    'RacesFinished' => 0,
                                    'Params' => '',
                                ),
                            10 =>
                                array (
                                    'TierType' => 'tier3',
                                    'TierEventType' => 'regullar',
                                    'RacesFinished' => 0,
                                    'Params' => '',
                                ),
                            11 =>
                                array (
                                    'TierType' => 'tier3',
                                    'TierEventType' => 'daily',
                                    'RacesFinished' => 0,
                                    'Params' => 'ride_timestamp=0;ride_won_timestamp=0;days_in_a_row=0',
                                ),
                        ),
                    '_OtherEvents' =>
                        array (
                            'Difficulty1UnlockedPopup' =>
                                array (
                                    'Value' => false,
                                ),
                            'Difficulty2UnlockedPopup' =>
                                array (
                                    'Value' => false,
                                ),
                            'RewardBoxUsedOnce' =>
                                array (
                                    'Value' => false,
                                ),
                            'LastTutorialRaceFinished' =>
                                array (
                                    'Value' => true,
                                ),
                        ),
                    'LastEvent' =>
                        array (
                            'TierIndex' => 0,
                            'TierEventType' => 'regullar',
                            'LastSelectedDifficulty' => 0,
                            'TimeStamp' => 0,
                        ),
                    'LastBossFight' =>
                        array (
                            'TierIndex' => 0,
                            'TimeStamp' => 0,
                        ),
                    'PersonalBest' =>
                        array (
                            'Value' => 10000.0,
                        ),
                    'RacesPlayed' => 1,
                    'MPRacesPlayed' => 0,
                ),
            'ActiveAnimalType' => 'boar',
            'Experience' => 2,
            'Pet' =>
                array (
                    'LastHappy' => 637822514761261533,
                ),
            'Animals' =>
                array (
                    0 =>
                        array (
                            'AnimalType' => 'boar',
                            'ColorOption' => 0,
                            'ActiveAttachment' => 'v1',
                            'AvailableAttachments' =>
                                array (
                                    0 =>
                                        array (
                                            'Name' => 'v1',
                                        ),
                                ),
                            'Upgrades' =>
                                array (
                                    0 =>
                                        array (
                                            'UpgradeType' => 'muscles',
                                            'Level' => 0,
                                            'NextLevelTime' => 0,
                                        ),
                                    1 =>
                                        array (
                                            'UpgradeType' => 'lung',
                                            'Level' => 0,
                                            'NextLevelTime' => 0,
                                        ),
                                    2 =>
                                        array (
                                            'UpgradeType' => 'reflex',
                                            'Level' => 0,
                                            'NextLevelTime' => 0,
                                        ),
                                    3 =>
                                        array (
                                            'UpgradeType' => 'boost',
                                            'Level' => 0,
                                            'NextLevelTime' => 0,
                                        ),
                                    4 =>
                                        array (
                                            'UpgradeType' => 'boost2',
                                            'Level' => 0,
                                            'NextLevelTime' => 0,
                                        ),
                                ),
                            'DeliveryTime' => 0,
                            'TimeStamp' => 637822514761171464,
                        ),
                ),
            'TutorialProgress' =>
                array (
                    'TutorialSteps' =>
                        array (
                            0 =>
                                array (
                                    'StepId' => 'animal_upgrade',
                                    'WasCompleted' => false,
                                ),
                            1 =>
                                array (
                                    'StepId' => 'boss_menu',
                                    'WasCompleted' => false,
                                ),
                            2 =>
                                array (
                                    'StepId' => 'boss_map',
                                    'WasCompleted' => false,
                                ),
                            3 =>
                                array (
                                    'StepId' => 'boss_race',
                                    'WasCompleted' => false,
                                ),
                            4 =>
                                array (
                                    'StepId' => 'run_for_cash_map',
                                    'WasCompleted' => false,
                                ),
                            5 =>
                                array (
                                    'StepId' => 'run_for_cash_menu',
                                    'WasCompleted' => false,
                                ),
                            6 =>
                                array (
                                    'StepId' => 'run_for_cash_race',
                                    'WasCompleted' => false,
                                ),
                            7 =>
                                array (
                                    'StepId' => 'daily',
                                    'WasCompleted' => false,
                                ),
                            8 =>
                                array (
                                    'StepId' => 'tournament',
                                    'WasCompleted' => false,
                                ),
                        ),
                ),
        );
}
