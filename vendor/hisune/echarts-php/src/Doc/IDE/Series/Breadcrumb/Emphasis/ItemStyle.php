<?php
/**
 * Created by Hisune EchartsPHP AutoGenerate.
 * @author: Hisune <hi@hisune.com>
 */

namespace Hisune\EchartsPHP\Doc\IDE\Series\Breadcrumb\Emphasis;

use Hisune\EchartsPHP\Property;

/**
 * @property string $color Default: 'rgba(0,0,0,0.7)'
 *    
 *     
 *     breadcrumb color. Since 5.2.0, it can be set to inherit in the emphasis state to disable color highlight.
 *     
 *     Supports setting as solid color using rgb(255,255,255), rgba(255,255,255,1), #fff, etc. Also supports setting as gradient color and pattern fill, see option.color for details
 *
 * @property string $borderColor Default: 'rgba(255,255,255,0.7)'
 *    
 *     
 *     breadcrumb border color, whose format is similar to that of color.
 *
 * @property int $borderWidth Default: 1
 *    
 *     
 *     breadcrumb border width. No border when it is set to be 0.
 *     breadcrumb border width. No border when it is set to be 0.
 *
 * @property string|int|array $borderType Default: 'solid'
 *    
 *     
 *     
 *     breadcrumb border type.
 *     Possible values are:
 *     
 *     solid
 *     dashed
 *     dotted
 *     
 *     Since v5.0.0, it can also be a number or a number array to specify the dash array of the line. With 
 *     borderDashOffset
 *     , we can make the line style more flexible.
 *     For example：
 *     {
 *     
 *     borderType: [5, 10],
 *     
 *     borderDashOffset: 5
 *     }
 *
 * @property int $borderDashOffset Default: 0
 *    
 *     Since v5.0.0
 *     
 *     
 *     
 *     To set the line dash offset. With 
 *     borderType
 *     , we can make the line style more flexible.
 *     Refer to MDN lineDashOffset for more details.
 *
 * @property string $borderCap Default: 'butt'
 *    
 *     Since v5.0.0
 *     
 *     
 *     
 *     To specify how to draw the end points of the line.
 *     Possible values are:
 *     
 *     butt: The ends of lines are squared off at the endpoints.
 *     round: The ends of lines are rounded.
 *     square: The ends of lines are squared off by adding a box with an equal width and half the height of the lines thickness.
 *     
 *     Default value is butt. Refer to MDN lineCap for more details.
 *
 * @property string $borderJoin Default: 'bevel'
 *    
 *     Since v5.0.0
 *     
 *     
 *     
 *     To determine the shape used to join two line segments where they meet.
 *     Possible values are:
 *     
 *     bevel: Fills an additional triangular area between the common endpoint of connected segments, and the separate outside rectangular corners of each segment.
 *     round: Rounds off the corners of a shape by filling an additional sector of disc centered at the common endpoint of connected segments. The radius for these rounded corners is equal to the line width.
 *     miter: Connected segments are joined by extending their outside edges to connect at a single point, with the effect of filling an additional lozenge-shaped area. This setting is affected by the 
 *     borderMiterLimit
 *     property.
 *     
 *     Default value is bevel. Refer to MDN lineJoin for more details.
 *
 * @property int $borderMiterLimit Default: 10
 *    
 *     Since v5.0.0
 *     
 *     
 *     
 *     To set the miter limit ratio. Only works when 
 *     borderJoin
 *      is set as miter.
 *     Default value is 10. Negative、0、Infinity and NaN values are ignored.
 *     Refer to MDN miterLimit for more details.
 *
 * @property int $shadowBlur Default: 3
 *    
 *     
 *     Size of shadow blur. This attribute should be used along with shadowColor,shadowOffsetX, shadowOffsetY to set shadow to component.
 *     For example:
 *     {
 *         shadowColor: rgba(0, 0, 0, 0.5),
 *         shadowBlur: 10
 *     }
 *
 * @property string $shadowColor Default: 'rgba(150,150,150,1)'
 *    
 *     
 *     Shadow color. Support same format as color.
 *
 * @property int $shadowOffsetX Default: 0
 *    
 *     
 *     Offset distance on the horizontal direction of shadow.
 *
 * @property int $shadowOffsetY Default: 0
 *    
 *     
 *     Offset distance on the vertical direction of shadow.
 *
 * @property int $opacity
 *    
 *     
 *     Opacity of the component. Supports value from 0 to 1, and the component will not be drawn when set to 0.
 *
 * @property ItemStyle\TextStyle $textStyle
 *    
 *
 * {_more_}
 */
class ItemStyle extends Property {}