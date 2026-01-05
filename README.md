# XGTShowPlayerHP

## Description


This is a PocketMine Plugin.
It shows the health of the opponent.

You have two options:
1. show your opponent's health in numbers 

2. show your opponent's health in hearts

## How to install

1. Install plugin

2. Stop/start server

3. Edit config

4. Restart server

5. Have FUN!


## Features
- [X] Config

- [X] Costom Message

- [X] Custom Format

- [X] Custom Type: Numeric/Emoji

- [X] Custom Show

## Other

[![Discord](https://img.shields.io/discord/689211475537297411?logo=discord)](https://discord.gg/h8uTKFh)

[![](https://poggit.pmmp.io/shield.dl.total/XGTShowPlayerHP)](https://poggit.pmmp.io/p/XGTShowPlayerHP)

[![ForTheBadge built-with-love](http://ForTheBadge.com/images/badges/built-with-love.svg)](https://github.com/XGDavid)


## Config

```
# Display Show:
# 1 = It only shows you health when you hit it with a projectile
# 2 = It shows your health when you hit it with anything
show-mode: 2

#Display Type:
# 0 = Disable Show HP
# 1 = Default, show numeric HP
# 2 = Show Player HP in Hreat Emoji(Hypixel)
display-type: 2

# Format type:
# 1 = Send Player Message with Attacked player HP
# 2 = Send Player Popup with Attacked player HP
# 3 = Send Player Title with Attacked player HP
format-type: 2

max-hearts: 10

heart-full: "§4❤"
heart-half: "§c❤"
heart-empty: "§7❤"

# Message:
# (optional)Use for Heart = ❤
# (optional)Use for Color = §
# @name = Player name
# @hp = Player HP
message-format: "§l§e@name §cis now in§e @hp §cHP"
popup-format: "§l§7@name§c @hp §4❤"
title-format: "§l§b@name §r§c\n@hp §4❤"

hearts-prefix-message: "§6§lDMG Informer »§6 "
hearts-prefix-popup: "§6§l"
hearts-prefix-title: "§6§l"
```

