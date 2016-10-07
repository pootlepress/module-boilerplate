# PPB Module boilerplate
A structured, object oriented foundation to help you quickly navigate your way to making awesome Pootle Pagebuilder modules.

## Contents

PPB module class contain following methods:

### `PPB_Module_Boilerplate`::`instance()`

* Gets PPB_Module_Boilerplate instance
* @return PPB_Module_Boilerplate instance
* @since 	1.0.0

-------

### `PPB_Module_Boilerplate`::`__construct()`

* PootlePB_Meta_Slider constructor.

-------

### `PPB_Module_Boilerplate`::`init()`

* Initiates the addon
* @action init

-------

### `PPB_Module_Boilerplate`::`module( $mods )`

* The module box data
* @param array $mods Modules
* @return array
* @filter pootlepb_modules

-------

### `PPB_Module_Boilerplate`::`module_plugin( $mods )`

* USE THIS ONLY IF YOUR MODULE NEEDS AN EXTERNAL PLUGIN TO WORK
* Adds plugin entry in Free modules section
* @param array $mods Modules
* @return mixed
* @filter pootlepb_modules_page

-------

### `PPB_Module_Boilerplate`::`tab( $tabs )`

* Adds module tab in content block panel
* @param array $tabs Content block panel tabs
* @return mixed
* @filter pootlepb_content_block_tabs, pootlepb_le_content_block_tabs

-------

### `PPB_Module_Boilerplate`::`fields( $fields )`

* Adds module fields in content block panel
* @param $fields
* @return mixed
* @filter pootlepb_content_block_fields

-------

### `PPB_Module_Boilerplate`::`content( $info )`

* Renders the module content
* @param array $info Content block info
* @action pootlepb_render_content_block

## Features

* All methods and properties are documented so that you know what you need to be changed.
* All action and filter hooks, admin as well as public, have code comments commented.
* Demonstration of Pootle Pagebuilder content block actions and filters
  * A sample tab added to content block panel, via `pootlepb_content_block_tabs` filter.
  * Few sample fields added to the tab in content block panel, via `pootlepb_content_block_fields` filter.
  * Adding module content to content block via `pootlepb_render_content_block` action hook.

## License

The WordPress Plugin Boilerplate is licensed under the GPL v2 or later.

> This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License, version 2, as published by the Free Software Foundation.

> This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

> You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA

## Just these two things to get started quickly

1. Change plugin directory and file name to reflect your module name
2. Do following search and replace through your entire project

Search For | Replace With
-----------|-------------
PPB_Module_Boilerplate | Your_Awesome_Module
Module Boilerplate | Your Awesome Module
ppb-module-biolerplate | ppb-your-awesome-module
