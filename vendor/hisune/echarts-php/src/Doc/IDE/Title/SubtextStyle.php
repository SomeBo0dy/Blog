<?php
/**
 * Created by Hisune EchartsPHP AutoGenerate.
 * @author: Hisune <hi@hisune.com>
 */

namespace Hisune\EchartsPHP\Doc\IDE\Title;

use Hisune\EchartsPHP\Property;

/**
 * @property string $color Default: '#aaa'
 *    
 *     
 *     subtitle text color.
 *
 * @property string $fontStyle Default: 'normal'
 *    
 *     
 *     subtitle font style.
 *     Options are:
 *     
 *     normal
 *     italic
 *     oblique
 *
 * @property string|int $fontWeight Default: 'normal'
 *    
 *     
 *     subtitle font thick weight.
 *     Options are:
 *     
 *     normal
 *     bold
 *     bolder
 *     lighter
 *     100 | 200 | 300 | 400...
 *
 * @property string $fontFamily Default: 'sans-serif'
 *    
 *     
 *     subtitle font family.
 *     Can also be serif , monospace, ...
 *
 * @property int $fontSize Default: 12
 *    
 *     
 *     subtitle font size.
 *
 * @property string $align
 *    
 *     
 *     Horizontal alignment of text, automatic by default.
 *     Options are:
 *     
 *     left
 *     center
 *     right
 *     
 *     If align is not set in rich, align in parent level will be used. For example:
 *     {
 *         align: right,
 *         rich: {
 *             a: {
 *                 // `align` is not set, then it will be right
 *             }
 *         }
 *     }
 *
 * @property string $verticalAlign
 *    
 *     
 *     Vertical alignment of text, automatic by default.
 *     Options are:
 *     
 *     top
 *     middle
 *     bottom
 *     
 *     If verticalAlign is not set in rich, verticalAlign in parent level will be used. For example:
 *     {
 *         verticalAlign: bottom,
 *         rich: {
 *             a: {
 *                 // `verticalAlign` is not set, then it will be bottom
 *             }
 *         }
 *     }
 *
 * @property int $lineHeight
 *    
 *     
 *     Line height of the text fragment.
 *     If lineHeight is not set in rich, lineHeight in parent level will be used. For example:
 *     {
 *         lineHeight: 56,
 *         rich: {
 *             a: {
 *                 // `lineHeight` is not set, then it will be 56
 *             }
 *         }
 *     }
 *
 * @property int $width
 *    
 *     
 *     Width of text block.
 *
 * @property int $height
 *    
 *     
 *     Height of text block.
 *
 * @property string $textBorderColor
 *    
 *     
 *     Storke color of the text.
 *
 * @property int $textBorderWidth
 *    
 *     
 *     Storke line width of the text.
 *
 * @property string|int|array $textBorderType Default: 'solid'
 *    
 *     
 *     
 *     Stroke line type of the text.
 *     Possible values are:
 *     
 *     solid
 *     dashed
 *     dotted
 *     
 *     Since v5.0.0, it can also be a number or a number array to specify the dash array of the line. With 
 *     textBorderDashOffset
 *     , we can make the line style more flexible.
 *     For example：
 *     {
 *     
 *     textBorderType: [5, 10],
 *     
 *     textBorderDashOffset: 5
 *     }
 *
 * @property int $textBorderDashOffset Default: 0
 *    
 *     Since v5.0.0
 *     
 *     
 *     
 *     To set the line dash offset. With 
 *     textBorderType
 *     , we can make the line style more flexible.
 *     Refer to MDN lineDashOffset for more details.
 *
 * @property string $textShadowColor Default: 'transparent'
 *    
 *     
 *     Shadow color of the text itself.
 *
 * @property int $textShadowBlur Default: 0
 *    
 *     
 *     Shadow blue of the text itself.
 *
 * @property int $textShadowOffsetX Default: 0
 *    
 *     
 *     Shadow X offset of the text itself.
 *
 * @property int $textShadowOffsetY Default: 0
 *    
 *     
 *     Shadow Y offset of the text itself.
 *
 * @property string $overflow Default: 'none'
 *    
 *     
 *     Determine how to display the text when its overflow. Available when width is set.
 *     
 *     truncate Truncate the text and trailing with ellipsis.
 *     break Break by word
 *     breakAll Break by character.
 *
 * @property string $ellipsis Default: '...'
 *    Ellipsis to be displayed when overflow is set to truncate.
 *     
 *     truncate Truncate the overflow lines.
 *
 * @property SubtextStyle\Rich $rich
 *    Rich text styles can be defined in this rich property. For example:
 *     label: {
 *         // Styles defined in rich can be applied to some fragments
 *         // of text by adding some markers to those fragment, like
 *         // `{styleName|text content text content}`.
 *         // `\n` is the newline character.
 *         formatter: [
 *             {a|Style a is applied to this snippet}
 *             {b|Style b is applied to this snippet}This snippet use default style{x|use style x}
 *         ].join(\n),
 *     
 *         rich: {
 *             a: {
 *                 color: red,
 *                 lineHeight: 10
 *             },
 *             b: {
 *                 backgroundColor: {
 *                     image: xxx/xxx.jpg
 *                 },
 *                 height: 40
 *             },
 *             x: {
 *                 fontSize: 18,
 *                 fontFamily: Microsoft YaHei,
 *                 borderColor: #449933,
 *                 borderRadius: 4
 *             },
 *             ...
 *         }
 *     }
 *     
 *     For more details, see Rich Text please.
 *
 * {_more_}
 */
class SubtextStyle extends Property {}