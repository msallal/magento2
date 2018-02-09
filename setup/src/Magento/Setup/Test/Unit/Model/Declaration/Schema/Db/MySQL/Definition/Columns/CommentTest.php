<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Setup\Test\Unit\Model\Declaration\Schema\Db\MySQL\Definition\Columns;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\Setup\Model\Declaration\Schema\Db\MySQL\Definition\Columns\Comment;
use Magento\Setup\Model\Declaration\Schema\Dto\Column;

class CommentTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * @var \Magento\Setup\Model\Declaration\Schema\Db\MySQL\Definition\Columns\Comment
     */
    private $comment;

    protected function setUp()
    {
        $this->objectManager = new ObjectManager($this);
        $this->comment = $this->objectManager->getObject(
            Comment::class
        );
    }

    /**
     * Test conversion to definition.
     */
    public function testToDefinition()
    {
        /** @var Column|\PHPUnit_Framework_MockObject_MockObject $column */
        $column = $this->getMockBuilder(Column::class)
            ->disableOriginalConstructor()
            ->getMock();
        $column->expects($this->any())
            ->method('getComment')
            ->willReturn('comment');
        $this->assertEquals(
            'COMMENT "comment"',
            $this->comment->toDefinition($column)
        );
    }
}
