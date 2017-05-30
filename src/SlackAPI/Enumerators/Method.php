<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;

/**
 * Enumerator for methods from Slack API
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @see https://api.slack.com/methods
 * @version 0.2
 */
class Method extends Enum
{
    #api
    const API_TEST = 'api.test';
    
    #auth
    const AUTH_REVOKE = 'auth.revoke';
    const AUTH_TEST = 'auth.test';
    
    #bots
    const BOTS_INFO = 'bots.info';
    
    #channels
    const CHANNELS_ARCHIVE = 'channels.archive';
    const CHANNELS_CREATE = 'channels.create';
    const CHANNELS_HISTORY = 'channels.history';
    const CHANNELS_INFO = 'channels.info';
    const CHANNELS_INVITE = 'channels.invite';
    const CHANNELS_JOIN = 'channels.join';
    const CHANNELS_KICK = 'channels.kick';
    const CHANNELS_LEAVE = 'channels.leave';
    const CHANNELS_LIST = 'channels.list';
    const CHANNELS_MARK = 'channels.mark';
    const CHANNELS_RENAME = 'channels.rename';
    const CHANNELS_REPLIES = 'channels.replies';
    const CHANNELS_SET_PURPOSE = 'channels.setPurpose';
    const CHANNELS_SET_TOPIC = 'channels.setTopic';
    const CHANNELS_UNARCHIVE = 'channels.unarchive';
    
    #chat
    const CHAT_DELETE = 'chat.delete';
    const CHAT_ME_MESSAGE = 'chat.meMessage';
    const CHAT_POST_MESSAGE = 'chat.postMessage';
    const CHAT_UNFURL = 'chat.unfurl';
    const CHAT_UPDATE = 'chat.update';
    
    #dnd
    const DND_END_DND = 'dnd.endDnd';
    const DND_END_SNOOZE = 'dnd.endSnooze';
    const DND_INFO = 'dnd.info';
    const DND_SET_SNOOZE = 'dnd.setSnooze';
    const DND_TEAM_INFO = 'dnd.teamInfo';
    
    #emoji
    const EMOJI_LIST = 'emojiList';
    
    #files.comments
    const FILES_COMMENTS_ADD = 'files.comments.add';
    const FILES_COMMENTS_DELETE = 'files.comments.delete';
    const FILES_COMMENTS_EDIT = 'files.comments.edit';
    
    #files
    const FILES_DELETE = 'files.delete';
    const FILES_INFO = 'files.info';
    const FILES_LIST = 'files.list';
    const FILES_REVOKE_PUBLIC_URL = 'files.revokePublicURL';
    const FILES_SHARED_PUBLIC_URL = 'files.sharedPublicURL';
    const FILES_UPLOAD = 'files.upload';
    
    #groups
    const GROUPS_ARCHIVE = 'groups.archive';
    const GROUPS_CLOSE = 'groups.close';
    const GROUPS_CREATE = 'groups.create';
    const GROUPS_CREATE_CHILD = 'groups.createChild';
    const GROUPS_HISTORY = 'groups.history';
    const GROUPS_INFO = 'groups.info';
    const GROUPS_INVITE = 'groups.invite';
    const GROUPS_KICK = 'groups.kick';
    const GROUPS_LEAVE = 'groups.leave';
    const GROUPS_LIST = 'groups.list';
    const GROUPS_MARK = 'groups.mark';
    const GROUPS_OPEN = 'groups.open';
    const GROUPS_RENAME = 'groups.rename';
    const GROUPS_REPLIES = 'groups.replies';
    const GROUPS_SET_PURPOSE = 'groups.setPurpose';
    const GROUPS_SET_TOPIC = 'groups.setTopic';
    const GROUPS_UNARCHIVE = 'groups.unarchive';
    
    #im
    const IM_CLOSE = 'im.close';
    const IM_HISTORY = 'im.history';
    const IM_LIST = 'im.list';
    const IM_MARK = 'im.mark';
    const IM_OPEN = 'im.open';
    const IM_REPLIES = 'im.replies';
    
    #mpim
    const MPIM_CLOSE = 'mpim.close';
    const MPIM_HISTORY = 'mpim.history';
    const MPIM_LIST = 'mpim.list';
    const MPIM_MARK = 'mpim.mark';
    const MPIM_OPEN = 'mpim.open';
    const MPIM_REPLIES = 'mpim.replies';
    
    #oauth
    const OAUTH_ACCESS = 'oauth.access';
    
    #pins
    const PINS_ADD = 'pins.add';
    const PINS_LIST = 'pins.list';
    const PINS_REMOVE = 'pins.remove';
    
    #reactions
    const REACTIONS_ADD = 'reactions.add';
    const REACTIONS_GET = 'reactions.get';
    const REACTIONS_LIST = 'reactions.list';
    const REACTIONS_REMOVE = 'reactions.remove';
    
    #reminders
    const REMINDERS_ADD = 'reminders.add';
    const REMINDERS_COMPLETE = 'reminders.complete';
    const REMINDERS_DELETE = 'reminders.delete';
    const REMINDERS_INFO = 'reminders.info';
    const REMINDERS_LIST = 'reminders.list';
    
    #rtm
    const RTM_CONNECT = 'rtm.connect';
    const RTM_START = 'rtm.start';
    
    #search
    const SEARCH_ALL = 'search.all';
    const SEARCH_FILES = 'search.files';
    const SEARCH_MESSAGES = 'search.messages';
    
    #stars
    const STARS_ADD = 'stars.add';
    const STARS_LIST = 'stars.list';
    const STARS_REMOVE = 'stars.remove';
    
    #team
    const TEAM_ACCESS_LOGS = 'team.accessLogs';
    const TEAM_BILLABLE_INFO = 'team.billableInfo';
    const TEAM_INFO = 'team.info';
    const TEAM_INTEGRATION_LOGS = 'team.integrationLogs';
    
    #team.profile
    const TEAM_PROFILE_GET = 'team.profile.get';
    
    #usergroups
    const USERGROUPS_CREATE = 'usergroups.create';
    const USERGROUPS_DISABLE = 'usergroups.disable';
    const USERGROUPS_ENABLE = 'usergroups.enable';
    const USERGROUPS_LIST = 'usergroups.list';
    const USERGROUPS_UPDATE = 'usergroups.update';
    
    #usergroups.users
    const USERGROUPS_USERS_LIST = 'usergroups.users.list';
    const USERGROUPS_USERS_UPDATE = 'usergroups.users.update';
    
    #users
    const USERS_DELETE_PHOTO = 'users.deletePhoto';
    const USERS_GET_PRESENCE = 'users.getPresence';
    const USERS_IDENTITY = 'users.identity';
    const USERS_INFO = 'users.info';
    const USERS_LIST = 'users.list';
    const USERS_SET_ACTIVE = 'users.setActive';
    const USERS_SET_PHOTO = 'users.setPhoto';
    const USERS_SET_PRESENCE = 'users.setPresence';
    
    #users.profile
    const USERS_PROFILE_GET = 'users.profile.get';
    const USERS_PROFILE_SET = 'users.profile.set';
    
    /**
     * Check and see if the method is available to an App Bot
     * 
     * @see https://api.slack.com/bot-users#method_list
     * @return bool
     */
    public function isAvailableToAppBot()
    {
        return in_array($this->value, [
            self::API_TEST,
            self::AUTH_TEST,
            self::CHANNELS_INFO,
            self::CHANNELS_LIST,
            self::CHAT_ME_MESSAGE,
            self::CHAT_POST_MESSAGE,
            self::CHAT_UPDATE,
            self::DND_INFO,
            self::DND_TEAM_INFO,
            self::FILES_COMMENTS_ADD,
            self::FILES_COMMENTS_DELETE,
            self::FILES_COMMENTS_EDIT,
            self::FILES_DELETE,
            self::FILES_INFO,
            self::FILES_UPLOAD,
            self::GROUPS_INFO,
            self::GROUPS_LIST,
            self::IM_CLOSE,
            self::IM_HISTORY,
            self::IM_LIST,
            self::IM_MARK,
            self::IM_OPEN,
            self::MPIM_CLOSE,
            self::MPIM_HISTORY,
            self::MPIM_LIST,
            self::MPIM_MARK,
            self::MPIM_OPEN,
            self::OAUTH_ACCESS,
            self::PINS_ADD,
            self::PINS_REMOVE,
            self::REACTIONS_ADD,
            self::REACTIONS_GET,
            self::REACTIONS_LIST,
            self::REACTIONS_REMOVE,
            self::RTM_CONNECT,
            self::RTM_START,
            self::STARS_ADD,
            self::STARS_REMOVE,
            self::TEAM_INFO,
            self::USERS_GET_PRESENCE,
            self::USERS_INFO,
            self::USERS_LIST,
            self::USERS_SET_ACTIVE,
            self::USERS_SET_PRESENCE,
        ]);
    }
    
    /**
     * Check and see if the method is available to a Custom Bot
     *
     * @see https://api.slack.com/bot-users#method_list
     * @return bool
     */
    public function isAvailableToCustomBot()
    {
        return in_array($this->value, [
            self::API_TEST,
            self::AUTH_REVOKE,
            self::AUTH_TEST,
            self::CHANNELS_HISTORY,
            self::CHANNELS_INFO,
            self::CHANNELS_LIST,
            self::CHANNELS_MARK,
            self::CHANNELS_REPLIES,
            self::CHANNELS_SET_PURPOSE,
            self::CHANNELS_SET_TOPIC,
            self::CHAT_DELETE,
            self::CHAT_ME_MESSAGE,
            self::CHAT_POST_MESSAGE,
            self::CHAT_UPDATE,
            self::DND_INFO,
            self::DND_TEAM_INFO,
            self::EMOJI_LIST,
            self::FILES_COMMENTS_ADD,
            self::FILES_COMMENTS_DELETE,
            self::FILES_COMMENTS_EDIT,
            self::FILES_DELETE,
            self::FILES_INFO,
            self::FILES_UPLOAD,
            self::GROUPS_CLOSE,
            self::GROUPS_HISTORY,
            self::GROUPS_INFO,
            self::GROUPS_LIST,
            self::GROUPS_MARK,
            self::GROUPS_OPEN,
            self::GROUPS_SET_PURPOSE,
            self::GROUPS_SET_TOPIC,
            self::IM_CLOSE,
            self::IM_HISTORY,
            self::IM_LIST,
            self::IM_MARK,
            self::IM_OPEN,
            self::MPIM_CLOSE,
            self::MPIM_HISTORY,
            self::MPIM_LIST,
            self::MPIM_MARK,
            self::MPIM_OPEN,
            self::OAUTH_ACCESS,
            self::PINS_ADD,
            self::PINS_LIST,
            self::PINS_REMOVE,
            self::REACTIONS_ADD,
            self::REACTIONS_GET,
            self::REACTIONS_LIST,
            self::REACTIONS_REMOVE,
            self::RTM_CONNECT,
            self::RTM_START,
            self::STARS_ADD,
            self::STARS_REMOVE,
            self::TEAM_INFO,
            self::USERS_GET_PRESENCE,
            self::USERS_INFO,
            self::USERS_LIST,
            self::USERS_SET_ACTIVE,
            self::USERS_SET_PRESENCE,
        ]);
    }
}