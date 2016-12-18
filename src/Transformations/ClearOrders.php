<?php
/**
 * SwiftOtter_Base is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * SwiftOtter_Base is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with SwiftOtter_Base. If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Joseph Maxwell
 * @copyright SwiftOtter Studios, 12/5/16
 * @package default
 **/

namespace Driver\Commands\Transformations\Magento1;

use Driver\Commands\CommandInterface;
use Driver\Engines\MySql\Sandbox\Connection;
use Driver\Engines\MySql\Sandbox\Utilities;
use Driver\Pipeline\Environment\EnvironmentInterface;
use Driver\Pipeline\Transport\TransportInterface;
use Symfony\Component\Console\Command\Command;

class ClearOrders extends Command implements CommandInterface
{
    use ClearTrait;

    private $connection;
    protected $utilities;
    private $properties;

    protected $tablesToClear = [
        'sales_flat_creditmemo',
        'sales_flat_creditmemo_comment',
        'sales_flat_creditmemo_grid',
        'sales_flat_creditmemo_item',
        'sales_flat_invoice',
        'sales_flat_invoice_comment',
        'sales_flat_invoice_grid',
        'sales_flat_invoice_item',
        'sales_flat_order',
        'sales_flat_order_address',
        'sales_flat_order_grid',
        'sales_flat_order_item',
        'sales_flat_order_payment',
        'sales_flat_order_status_history',
        'sales_flat_shipment',
        'sales_flat_shipment_comment',
        'sales_flat_shipment_grid',
        'sales_flat_shipment_item',
        'sales_flat_shipment_track',
        'sales_invoiced_aggregated',
        'sales_invoiced_aggregated_order',
        'sales_payment_transaction',
        'sales_order_aggregated_created',
        'sales_order_tax',
        'sales_order_tax_item',
        'sendfriend_log',
        'tag',
        'tag_relation',
        'tag_summary',
        'wishlist',
        'log_quote',
        'report_event',
    ];

    public function __construct(Connection $connection, Utilities $utilities, array $properties = [])
    {
        $this->connection = $connection->getConnection();
        $this->utilities = $utilities;
        $this->properties = $properties;

        parent::__construct('mysql-transformations-clear-orders');
    }

    public function getProperties()
    {
        return $this->properties;
    }

    public function go(TransportInterface $transport, EnvironmentInterface $environment)
    {
        $this->clear($environment);
    }
}