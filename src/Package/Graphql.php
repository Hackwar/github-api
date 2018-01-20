<?php
/**
 * Part of the Joomla Framework Github Package
 *
 * @copyright  Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Github\Package;

use Joomla\Github\AbstractPackage;

/**
 * GitHub API GraphQL class for the Joomla Framework.
 *
 * @since  __DEPLOY_VERSION__
 *
 * @documentation  https://developer.github.com/v4/
 */
class Graphql extends AbstractPackage
{
	/**
	 * Execute a query against the GraphQL API.
	 *
	 * @param   string  $query      The query to perform.
	 * @param   array   $variables  An optional array of variables to include in the request.
	 *
	 * @return  string
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function execute($query, array $variables = array())
	{
		// Build the request path.
		$path = '/graphql';

		$headers = array(
			'Accept' => 'application/vnd.github.v4+json',
		);

		$data = array(
			'query' => $query,
		);

		if (!empty($variables))
		{
			$data['variables'] = $variables;
		}

		// Send the request.
		return $this->processResponse(
			$this->client->post($this->fetchUrl($path), $data, $headers),
			201
		);
	}
}
